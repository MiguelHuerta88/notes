<?php
/**
 * Created by PhpStorm.
 * User: MiguelHuerta
 * Date: 4/6/17
 * Time: 12:21 PM
 */

namespace App\Http\Controllers;

use App\Models\Note;


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
        // we show all our notes
        $notes = $this->note->all();

        // return a json response
        return view('notes.index')->with('notes', $notes);

        //return response()->json(['notes' => $notes]);
    }

    /**
     * Create function.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // send them to the view with the form
        return view('notes.create');
    }

    /**
     * Store function
     *
     * @return
     */
    public function store()
    {
        // validate

        // store

        // return home
    }


}