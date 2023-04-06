<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $question = Question::create([
            'title' => $request->input('title'),
            'type' => $request->input('type'),
        ]);
        foreach ($request->input('options') as $optionText) {
            $question->options()->create(['text' => $optionText]);
        }
        return redirect()->route('questions.index');
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function answer(Question $question, Request $request)
    {
        $answer = $question->answers()->create(['text' => $request->input('answer')]);
        $answer->options()->sync($request->input('options', []));
