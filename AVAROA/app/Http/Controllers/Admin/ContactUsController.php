<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Setting;
use App\Models\User;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactUsController extends Controller
{
    use General;
    protected $model;
    public function __construct(ContactUs $contactUs)
    {
        $this->model = new Crud($contactUs);
    }

    public function contactUsIndex()
    {

        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['title'] = 'Contact Us List';
            $data['navContactUsParentActiveClass'] = 'mm-active';
            $data['navContactUsParentShowClass'] = 'mm-show';
            $data['subNavContactUsIndexActiveClass'] = 'mm-active';

            $data['contactUss'] = $this->model->getOrderById('DESC', 25);
            return view('admin.contact.index', $data);
        }
    }

    public function contactUsDelete($id)
    {


        $contactUs = $this->model->getRecordById($id);
        $contactUs->delete();
        $this->showToastrMessage('success', __('Deleted Successful'));
        return redirect()->back();
    }

    public function contactUsCMS()
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            $data['settings'] = Setting::pluck('option_value', 'option_key')->toArray();
            $data['title'] = 'Contact Us CMS';
            $data['navApplicationSettingParentActiveClass'] = 'mm-active';
            $data['subNavContactUsSettingsActiveClass'] = 'mm-active';
            $data['contactUsSettingsActiveClass'] = 'active';

            return view('admin.application_settings.contact_us.cms', $data);
        }
    }
}
