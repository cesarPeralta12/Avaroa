<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Ticket;
use App\Models\TicketDepartment;
use App\Models\TicketMessages;
use App\Models\TicketPriority;
use App\Models\TicketRelatedService;
use App\Models\User;
use App\Notifications\TicketCreated;
use App\Tools\Repositories\Crud;
use App\Traits\General;
use App\Traits\ImageSaveTrait;
use Auth;
use App\Traits\SendNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SupportTicketController extends Controller
{
    use General, ImageSaveTrait, SendNotification;

    protected $modalTicket, $modelTicketDepartment, $modelTicketPriority, $modelTicketService;

    public function __construct(Ticket $modalTicket, TicketDepartment $modelTicketDepartment, TicketPriority $modelTicketPriority, TicketRelatedService $modelTicketService)
    {
        $this->modalTicket = new CRUD($modalTicket);
        $this->modelTicketDepartment = new CRUD($modelTicketDepartment);
        $this->modelTicketPriority = new CRUD($modelTicketPriority);
        $this->modelTicketService = new CRUD($modelTicketService);
    }

    // Show form for creating a new ticket
    public function create()
    {
        if (Session::has('LoggedIn')) {
            $data['departments'] = TicketDepartment::all(); // Retrieve all departments
            $data['relatedServices'] = TicketRelatedService::all(); // Retrieve all related services
            $data['priorities'] = TicketPriority::all(); // Retrieve all priorities
            $data['tickets'] = Ticket::where('user_id', Session::get('LoggedIn'))
                ->with(['latestMessage.sendUser', 'priority', 'department', 'relatedService'])
                ->get();


            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
            return view('tickets.create', $data);
        }
    }

    // Store new ticket in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'status' => 'nullable|in:1,2',
            'department_id' => 'nullable|exists:ticket_departments,id',
            'related_service_id' => 'nullable|exists:ticket_related_services,id',
            'priority_id' => 'nullable|exists:ticket_priorities,id',
        ]);

        $ticket = Ticket::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'status' => $request->status ?? 1,
            'user_id' => Session::get('LoggedIn'),
            'department_id' => $request->department_id,
            'related_service_id' => $request->related_service_id,
            'priority_id' => $request->priority_id,
        ]);

        // Send notification to the ticket creator
        $ticket->notify(new TicketCreated($ticket));

        // Ensure admin gets the notification as well
        $adminUser = User::where('email', 'gen@negociosgen.com')->first();
        if ($adminUser) {
            $adminUser->notify(new TicketCreated($ticket));
        }

        // Notification for registration
        $text = 'Un nuevo ticket ha sido creado con el siguiente asunto';
        $target_url = route('support-ticket.index');
        $this->sendForApi($text, 1, $target_url, $ticket->user_id, 1);

        return back()->with('success', 'Ticket creado con éxito!');
    }

    public function ticketIndex()
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();
$data['priorities'] = TicketPriority::all(); // Retrieve all priorities
            $data['title'] = 'Support Ticket List';
            $data['navSupportTicketParentActiveClass'] = 'mm-active';
            $data['subNavSupportTicketIndexActiveClass'] = 'mm-active';
            $data['tickets'] = Ticket::all();

            return view('admin.support_ticket.index', $data);
        }
    }

    public function ticketOpen()
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();

            $data['title'] = 'Support Open Ticket List';
            $data['navSupportTicketParentActiveClass'] = 'mm-active';
            $data['subNavSupportTicketOpenActiveClass'] = 'mm-active';
            $data['tickets'] = Ticket::where('status', 1)->paginate(25);

            return view('admin.support_ticket.open', $data);
        }
    }

    public function ticketShow($uuid)
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();

            $data['title'] = 'Support Ticket Replies';
            $data['navSupportTicketParentActiveClass'] = 'mm-active';
            $data['subNavSupportTicketIndexActiveClass'] = 'mm-active';
            $data['ticket'] = $this->modalTicket->getRecordByUuid($uuid);
            $data['ticketMessages'] = TicketMessages::where('ticket_id', $data['ticket']->id)->get();
            $data['last_message'] = TicketMessages::where('ticket_id', $data['ticket']->id)->whereNotNull('sender_user_id')->latest()->first();

            return view('admin.support_ticket.details', $data);
        }
    }

    public function ticketUserShow($uuid)
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();

            $data['title'] = 'Support Ticket Replies';
            $data['navSupportTicketParentActiveClass'] = 'mm-active';
            $data['subNavSupportTicketIndexActiveClass'] = 'mm-active';
            $data['ticket'] = $this->modalTicket->getRecordByUuid($uuid);
            $data['ticketMessages'] = TicketMessages::where('ticket_id', $data['ticket']->id)->get();
            $data['last_message'] = TicketMessages::where('ticket_id', $data['ticket']->id)->whereNotNull('sender_user_id')->latest()->first();

            return view('tickets.details', $data);
        }
    }
    public function ticketDelete($uuid)
    {


        $ticket = Ticket::where('uuid', $uuid)->firstOrFail();
        TicketMessages::where('ticket_id', $ticket->id)->get()->map(function ($q) {
            $this->deleteFile($q->file);
            $q->delete();
        });
        $this->deleteFile($ticket->file);
        $ticket->delete();
        return redirect()->back();
    }

    public function changeTicketStatus(Request $request)
    {

        $ticket = Ticket::findOrFail($request->id);
        $ticket->status = $request->status;
        $ticket->save();

        return response()->json([
            'data' => 'success',
        ]);
    }

    public function messageStore(Request $request)
    {


        $request->validate([
            'message' => 'required',
            'file' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        $message = new TicketMessages();
        $message->ticket_id = $request->ticket_id;
        $message->reply_admin_user_id = Session::get('LoggedIn');
        $message->message = $request->message;

        if ($request->hasFile('file')) {
            $message->file = $this->saveImage('ticket_message', $request->file, 'null', 'null');
        }

        $message->save();

        return redirect()->back();
    }



    public function Department()
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();

            $data['title'] = 'Support Ticket Department Field';
            $data['navApplicationSettingParentActiveClass'] = 'mm-active';
            $data['subNavSupportSettingsActiveClass'] = 'mm-active';
            $data['supportDepartmentActiveClass'] = 'active';
            $data['departments'] = TicketDepartment::all();

            return view('admin.application_settings.support_ticket.ticket-department-list', $data);
        }
    }

    public function DepartmentStore(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255'
        ]);

        if ($request->id) {
            $item = TicketDepartment::find($request->id);
            $msg = 'Updated Successful';
            if (!$item) {
                $item = new TicketDepartment();
                $msg = 'Created Successful';
            }
        } else {
            $item = new TicketDepartment();
            $msg = 'Created Successful';
        }

        $item->name = $request->name;
        $item->save();

        return redirect()->back();
    }

    public function departmentDelete($uuid)
    {


        $this->modelTicketDepartment->deleteByUuid($uuid);

        return response()->json(['success' => true, 'message' => __('Deleted Successfully')]);
    }

    public function Priority()
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();

            $data['title'] = 'Support Ticket Priority Field';
            $data['navApplicationSettingParentActiveClass'] = 'mm-active';
            $data['subNavSupportSettingsActiveClass'] = 'mm-active';
            $data['supportPriorityActiveClass'] = 'active';
            $data['priorities'] = TicketPriority::all();

            return view('admin.application_settings.support_ticket.ticket-priority-list', $data);
        }
    }

    public function PriorityStore(Request $request)
    {


        $request->validate([
            'name' => 'required|max:255'
        ]);

        if ($request->id) {
            $item = TicketPriority::find($request->id);
            $msg = 'Update Successful';
            if (!$item) {
                $item = new TicketPriority();
                $msg = 'Created Successful';
            }
        } else {
            $item = new TicketPriority();
            $msg = 'Created Successful';
        }

        $item->name = $request->name;
        $item->save();


        return redirect()->back();
    }

    public function priorityDelete($uuid)
    {


        $this->modelTicketPriority->deleteByUuid($uuid);

        return response()->json(['success' => true, 'message' => __('Deleted Successfully')]);
    }


    public function RelatedService()
    {
        if (Session::has('LoggedIn')) {
            $data['user_session'] = User::where('id', Session::get('LoggedIn'))->first();

            $data['title'] = 'Support Ticket Related Service Field';
            $data['navApplicationSettingParentActiveClass'] = 'mm-active';
            $data['subNavSupportSettingsActiveClass'] = 'mm-active';
            $data['supportRelatedActiveClass'] = 'active';
            $data['services'] = TicketRelatedService::all();

            return view('admin.application_settings.support_ticket.ticket-related-service-list', $data);
        }
    }

    public function RelatedServiceStore(Request $request)
    {


        $request->validate([
            'name' => 'required|max:255'
        ]);

        if ($request->id) {
            $msg = 'Updated Successful';
            $item = TicketRelatedService::find($request->id);
            if (!$item) {
                $item = new TicketRelatedService();
                $msg = 'Created Successful';
            }
        } else {
            $item = new TicketRelatedService();
            $msg = 'Created Successful';
        }

        $item->name = $request->name;
        $item->save();

        return redirect()->back();
    }

    public function relatedServiceDelete($uuid)
    {


        $this->modelTicketService->deleteByUuid($uuid);
        return response()->json(['success' => true, 'message' => 'Successfully deleted']);
    }
    public function bulkDelete(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'ids' => 'required|array|min:1',
            'ids.*' => 'exists:tickets,id',  // Ensures each id is valid and exists in the 'tickets' table
        ]);

        // Get the ids from the request
        $ids = $request->input('ids');

        // Attempt to delete the tickets
        $deleted = Ticket::whereIn('id', $ids)->delete();

        if ($deleted) {
            return response()->json(['message' => __('Tickets have been deleted.')]);
        } else {
            return response()->json(['message' => __('No tickets found or error occurred during deletion.')], 400);
        }
    }
}
