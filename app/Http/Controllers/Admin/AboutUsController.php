<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUsGalleryImage;
use App\Models\AboutUsGeneral;
use App\Models\ClientLogo;
use App\Models\OurHistory;
use App\Models\Skill;
use App\Models\TeamMember;
use App\Models\User;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    use General, ImageSaveTrait;

    /**
     * Add user session data to the view data.
     */
    private function addUserSessionData(&$data)
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::find(Session::get('LoggedIn'));
        }
    }

    /**
     * Gallery Area View
     */
    public function galleryArea()
    {
        $data = [
            'title' => 'Gallery Area',
            'navApplicationSettingParentActiveClass' => 'mm-active',
            'subNavAboutUsSettingsActiveClass' => 'mm-active',
            'subNavGalleryAreaActiveClass' => 'active',
            'aboutUsGeneral' => AboutUsGeneral::first(),
            'galleryImages' => AboutUsGalleryImage::all(), // Fetch all gallery images
        ];
        $this->addUserSessionData($data);

        return view('admin.application_settings.about.gallery-area', $data);
    }

    /**
     * Update Gallery Area
     */
    public function galleryAreaUpdate(Request $request)
    {
        $request->validate([
            'gallery_area_title' => 'required|max:255',
            'gallery_area_subtitle' => 'required',
            'gallery_images.*.image' => 'mimes:jpg|file|dimensions:min_width=536,min_height=644,max_width=536,max_height=644|max:1024', // Validate images
        ]);

        $about = AboutUsGeneral::first() ?? new AboutUsGeneral();
        $about->gallery_area_title = $request->gallery_area_title;
        $about->gallery_area_subtitle = $request->gallery_area_subtitle;
        $about->save();

        // Process gallery images
        if ($request->has('gallery_images')) {
            foreach ($request->gallery_images as $galleryImage) {
                if (isset($galleryImage['image']) && $galleryImage['image'] instanceof \Illuminate\Http\UploadedFile) {
                    $imagePath = $this->updateImage(
                        'about_us_gallery', // Directory for gallery images
                        $galleryImage['image'],
                        null, // No old image to delete
                        null, // No specific width required here
                        null  // No specific height required here
                    );

                    // Save new gallery image record
                    AboutUsGalleryImage::create([
                        'image_path' => $imagePath,
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', __('Gallery Area updated successfully.'));
    }

    public function deleteGalleryImage(Request $request)
{
    $id = $request->id;
    $galleryImage = AboutUsGalleryImage::find($id);

    if ($galleryImage) {
        // Delete the image file from storage
        if ($galleryImage->image_path) {
            Storage::delete($galleryImage->image_path);
        }

        // Delete the database record
        $galleryImage->delete();

        return response()->json(['success' => true, 'message' => 'Image deleted successfully.']);
    }

    return response()->json(['success' => false, 'message' => 'Image not found.']);
}


    /**
     * Our History View
     */
    public function ourHistory()
    {
        $data = [
            'title' => 'Our History',
            'navApplicationSettingParentActiveClass' => 'mm-active',
            'subNavAboutUsSettingsActiveClass' => 'mm-active',
            'subNavOurHistoryActiveClass' => 'active',
            'aboutUsGeneral' => AboutUsGeneral::first(),
            'ourHistories' => OurHistory::all(),
        ];
        $this->addUserSessionData($data);

        return view('admin.application_settings.about.our-history', $data);
    }

    /**
     * Update Our History
     */
    public function ourHistoryUpdate(Request $request)
    {
        $about = AboutUsGeneral::first() ?? new AboutUsGeneral();
        $about->our_history_title = $request->our_history_title;
        $about->our_history_subtitle = $request->our_history_subtitle;
        $about->save();

        $now = now();
        $notInId = [];

        if ($request->has('our_histories')) {
            foreach ($request->our_histories as $ourHistory) {
                if ($ourHistory['year'] || $ourHistory['title'] || $ourHistory['subtitle']) {
                    $history = OurHistory::find($ourHistory['id']) ?? new OurHistory();
                    $history->updated_at = $now;
                    $history->year = $ourHistory['year'];
                    $history->title = $ourHistory['title'];
                    $history->subtitle = $ourHistory['subtitle'];
                    $history->save();
                    $notInId[] = $history->id;
                }
            }
            OurHistory::whereNotIn('id', $notInId)->delete();
        }

        OurHistory::where('updated_at', '!=', $now)->delete();

        return redirect()->back();
    }

    /**
     * Upgrade Skill View
     */
    public function upgradeSkill()
    {
        $data = [
            'title' => 'Upgrade Skill',
            'navApplicationSettingParentActiveClass' => 'mm-active',
            'subNavAboutUsSettingsActiveClass' => 'mm-active',
            'subNavUpgradeSkillActiveClass' => 'active',
            'aboutUsGeneral' => AboutUsGeneral::first(),
            'upgradeSkills' => Skill::all(),
        ];
        $this->addUserSessionData($data);

        return view('admin.application_settings.about.upgrade-skill', $data);
    }

    /**
     * Update Upgrade Skill
     */
    public function upgradeSkillUpdate(Request $request)
    {
        $request->validate([
            'upgrade_skill_logo' => 'mimes:jpg,jpeg,png|file|dimensions:min_width=505,min_height=540,max_width=505,max_height=540',
        ]);

        $about = AboutUsGeneral::first() ?? new AboutUsGeneral();

        // Update the upgrade skill logo
        if ($request->file('upgrade_skill_logo')) {
            $about->upgrade_skill_logo = $this->updateImage('about_us_general', $request->upgrade_skill_logo, $about->upgrade_skill_logo, null, null);
        }

        // Update the title and subtitle
        $about->upgrade_skill_title = $request->upgrade_skill_title;
        $about->upgrade_skill_subtitle = $request->upgrade_skill_subtitle;
        $about->save();

        // Handle dynamic skills
        $now = now();

        if ($request->has('upgrade_skills')) {
            foreach ($request->upgrade_skills as $skill) {
                if ($skill['name'] || $skill['description'] || $skill['image']) {
                    $upgradeSkill = Skill::find($skill['id']) ?? new Skill();

                    // Update skill image
                    if (isset($skill['image'])) {
                        $upgradeSkill->image = $this->updateImage('upgrade_skill', $skill['image'], $upgradeSkill->image, null, null);
                    }

                    $upgradeSkill->name = $skill['name'];
                    $upgradeSkill->description = $skill['description'];
                    $upgradeSkill->updated_at = $now;
                    $upgradeSkill->save();
                }
            }
        }

        // Delete skills that were not updated
        Skill::where('updated_at', '!=', $now)->get()->each(function ($skill): void {
            $this->deleteFile($skill->image);
            $skill->delete();
        });

        return redirect()->back()->with('success', __('Upgrade skills updated successfully!'));
    }

    public function deleteSkill(Request $request)
    {
        $skill = Skill::find($request->id);

        if ($skill) {
            // Delete the associated image if necessary
            if ($skill->image) {
                $this->deleteFile($skill->image);
            }
            $skill->delete();

            return response()->json(['success' => true, 'message' => 'Skill deleted successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Skill not found'], 404);
    }

    /**
     * Team Member View
     */
    public function teamMember()
    {
        $data = [
            'title' => 'Team Member',
            'navApplicationSettingParentActiveClass' => 'mm-active',
            'subNavAboutUsSettingsActiveClass' => 'mm-active',
            'subNavTeamMemberActiveClass' => 'active',
            'aboutUsGeneral' => AboutUsGeneral::first(),
            'teamMembers' => TeamMember::all(),
        ];
        $this->addUserSessionData($data);

        return view('admin.application_settings.about.team-member', $data);
    }

    /**
     * Update Team Member
     */
    public function teamMemberUpdate(Request $request)
    {
        $request->validate([
            'team_member_title' => 'required|max:255',
            'team_member_subtitle' => 'required',
            'team_member_logo' => 'mimes:png|file|dimensions:min_width=70,min_height=70,max_width=70,max_height=70',
        ]);

        $about = AboutUsGeneral::first() ?? new AboutUsGeneral();

        if ($request->file('team_member_logo')) {
            $about->team_member_logo = $this->updateImage('about_us_general', $request->team_member_logo, $about->team_member_logo, null, null);
        }

        $about->team_member_title = $request->team_member_title;
        $about->team_member_subtitle = $request->team_member_subtitle;
        $about->save();

        $now = now();
        if ($request->has('team_members')) {
            foreach ($request->team_members as $teamMember) {
                if ($teamMember['name'] || $teamMember['designation'] || $teamMember['image']) {
                    $team = TeamMember::find($teamMember['id']) ?? new TeamMember();
                    if (isset($teamMember['image'])) {
                        $team->image = $this->updateImage('team_member', $teamMember['image'], $team->image, null, null);
                    }
                    $team->name = $teamMember['name'];
                    $team->designation = $teamMember['designation'];
                    $team->updated_at = $now;
                    $team->save();
                }
            }
        }

        TeamMember::where('updated_at', '!=', $now)->get()->each(function ($q) {
            $this->deleteFile($q->image);
            $q->delete();
        });

        return redirect()->back();
    }

    /**
     * Client View
     */
    public function client()
    {
        $data = [
            'title' => 'Client',
            'navApplicationSettingParentActiveClass' => 'mm-active',
            'subNavAboutUsSettingsActiveClass' => 'mm-active',
            'subNavClientActiveClass' => 'active',
            'clients' => ClientLogo::all(),
        ];
        $this->addUserSessionData($data);

        return view('admin.application_settings.about.client', $data);
    }

    /**
     * Update Client
     */
    public function clientUpdate(Request $request)
    {
        $now = now();

        if ($request->has('client_details')) {
            foreach ($request->client_details as $clientDetail) {
                if ($clientDetail['name'] || $clientDetail['logo']) {
                    $clientLogo = ClientLogo::find($clientDetail['id']) ?? new ClientLogo();
                    $clientLogo->name = $clientDetail['name'];
                    if (isset($clientDetail['logo'])) {
                        $clientLogo->logo = $this->updateImage('client_logo', $clientDetail['logo'], $clientLogo->logo, null, null);
                    }
                    $clientLogo->updated_at = $now;
                    $clientLogo->save();
                }
            }
        }

        // Delete any client logos not updated in this request
        ClientLogo::where('updated_at', '!=', $now)->get()->each(function ($client) {
            $this->deleteFile($client->logo);
            $client->delete();
        });

        return redirect()->back();
    }
}
