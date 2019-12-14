<?php

namespace App\Http\Controllers;

use App\Categories;
use App\services\TaskService;
use App\Tasks;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class TaskController extends Controller
{

    /**
     * TaskController constructor.
     * @param TaskService $tasks
     */
    public function __construct(TaskService $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = User::find(Auth::id());

        return view('task.index', [
            'tasks' => $this->tasks->userTask($user),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::where('is_active', 1)->get();

        return view('task.create', [
            'category' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make((array)$request->all(), [
            'task_name' => 'required',
            'category' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/task/create')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Tasks();

        $task->user_id = Auth::id();
        $task->task_name = $request->task_name;
        $task->category_id = $request->category;
        $task->description = $request->description;

        $task->save();

        return redirect('/task');

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::findorfail(Auth::id());
        return view('task.show', [
            'task' => $this->tasks->userTask($user, $id),
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findorfail(Auth::id());
        $categories = Categories::where('is_active', 1)->get();

        return view('task.edit', [
            'task' => $this->tasks->userTask($user, $id),
            'category' => $categories,
        ]);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make((array)$request->all(), [
            'task_name' => 'required',
            'category' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect("/task/edit/$id")
                ->withInput()
                ->withErrors($validator);
        }

        $task = $this->tasks->userTask(User::findorfail(Auth::id()), $id);

        $task->user_id = Auth::id();
        $task->task_name = $request->task_name;
        $task->category_id = $request->category;
        $task->description = $request->description;
        $task->status = $request->status;

        $task->save();

        Session::flash('message', 'Successfully updated!');
        return redirect('/task');

    }

    /**
     * @param Request $request
     * @param Tasks $task
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Request $request, Tasks $task)
    {
        $this->authorize('destroy', $task);
        $task->delete();
        return redirect('/task');
    }
}
