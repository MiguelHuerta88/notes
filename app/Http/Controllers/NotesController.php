<?php
/**
 * Created by PhpStorm.
 * User: MiguelHuerta
 * Date: 4/6/17
 * Time: 12:21 PM
 */

namespace App\Http\Controllers;

use App\Models\Note;
use Auth;
use Validator;

class NotesController extends Controller
{

    /**
     * note model instance
     *
     * @var Note Model
     */
    protected $note;

    public function __construct(Note $note)
    {
        $this->note = $note;
    }

    /* the fun begins */

    /**
     * Display all notes that we currently have stored.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // we show all our notes. with user_id matching
        $notes = $this->note->where('user_id', Auth::id())->get();

        // return a json response
        //return view('notes.index')->with('notes', $notes);

        return response()->json(['notes' => $notes]);
    }

    /**
     * Create function.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // pull the user id
        $userId = Auth::id();
        // send them to the view with the form
        return view('notes.create')->with('userId', $userId);
    }

    /**
     * Store function
     *
     * @return
     */
    public function store()
    {
        // validate
        $validator = Validator::make(request()->all(), $this->note->rules);

        if($validator->fails()) {
            return response()->json(['message' => 'we have a problem validating', 'errors' => $validator->errors()]);
        }

        // store
        //$this->note->insert(request()->only('user_id', 'title', 'note'));
        $note = $this->note;
        $note->title = request()->get('title');
        $note->note = request()->get('note');
        $note->user_id = request()->get('user_id');
        $note->save();

        return response()->json(['message' => 'Note created.']);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        // pull the matching record
        $note = $this->note->find($id);

        return response()->json(['note' => $note]);
    }


    public function edit($id)
    {
        $note = $this->note->find($id);

        if(!$note) {
            request()->session()->flash('message', 'No note Found');
            return redirect()->route('notes.index');
        }

        return view('notes.edit')->with('note', $note);
    }

    public function update($id)
    {
        // pull the note
        $note = $this->note->find($id);

        if(!$note) {
            return response()->json(['message' => 'We could not find a matching note with this id']);
        }

        // validate
        $validator = Validator::make(request()->all(), $this->note->rules);

        if($validator->fails()) {
            return response()->json(['message' => 'we have a problem validating', 'errors' => $validator->errors()]);
        }

        // else update
        /*$this->note->update(
            [
                'title' => request()->get('title'),
                'user_id' => request()->get('user_id'),
                'note' => request()->get('note')
            ]
        );*/
        $note->title = request()->get('title');
        $note->note = request()->get('note');
        $note->user_id = request()->get('user_id');
        $note->save();

        // return response
        return response()->json(['mesage' => 'Note was successfully updated.']);
    }

    public function delete($id)
    {
        $note = $this->note->find($id);

        if(!$note) {
            return response()->json(['message' => 'We could not find a matching note record. No deletion was completed']);
        }

        // else delete
        $note->delete();

        return response()->json(['mesage' => 'Note with id: ' . $id . " was deleted"]);
    }
}