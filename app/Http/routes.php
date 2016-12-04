<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();

/*
* | Front End Routes
*/
Route::get('/', 'FrontEndController@index');
Route::get('/about', 'FrontEndController@about');
/* End FrontEnd Routes */
/*
==================================
*/
/*
* | Back End Routes
*/
Route::group(['prefix' => 'admin'], function (){
    Route::get('/dashboard', 'AdminController@dashboard');
    //levels
    Route::get('/levels', [
        'uses'    =>  'LevelsController@index',
        'as'      =>  'levels.index'
    ]);
    Route::post('/levels', [
        'uses'    =>  'LevelsController@create',
        'as'      =>  'levels.create'
    ]);
    Route::get('/levels/{id}', [
        'uses'    =>  'LevelsController@delete',
        'as'      =>  'level.delete'
    ]);
    // Levels End

    // quizes
    Route::get('/quizes', [
        'uses'    =>  'QuizesController@index',
        'as'      =>  'quizes.index'
    ]);
    Route::post('/quizes', [
        'uses'    =>  'QuizesController@create',
        'as'      =>  'quizes.create'
    ]);
    Route::post('/quizes/update', [
        'uses'    =>  'QuizesController@update',
        'as'      =>  'quizes.update'
    ]);
    Route::get('/quizes/delete/{id}', [
        'uses'    =>  'QuizesController@delete',
        'as'      =>  'quizes.delete'
    ]);
    // Quizes End

    // games Start

    Route::get('/games', [
        'uses' => 'GamesController@index',
        'as'   => 'games.index'
    ]);
    Route::post('/games', [
        'uses'    =>  'GamesController@create',
        'as'      =>  'games.create'
    ]);
    Route::post('/games/update', [
        'uses'    =>  'GamesController@update',
        'as'      =>  'games.update'
    ]);
    Route::get('/games/delete/{id}', [
        'uses'    =>  'GamesController@delete',
        'as'      =>  'games.delete'
    ]);

    // games End

    //quistions text Start

    Route::get('/quistions', [
        'uses'  =>  'QuistionTextController@index',
        'as'    =>  'quistions.index'
    ]);

    Route::post('/questions/create', [
        'uses'  =>  'QuistionTextController@create',
        'as'    =>  'question.create'
    ]);
    Route::post('/questions/update', [
        'uses'  =>  'QuistionTextController@update',
        'as'    =>  'question.update'
    ]);
    Route::get('/questions/delete/{id}', [
        'uses'  =>  'QuistionTextController@delete',
        'as'    =>  'question.delete'
    ]);

    //quistions text End

    //quistions Voice Start

    Route::get('/quistions/Voice', [
        'uses'  =>  'QuistionVioceController@index',
        'as'    =>  'quistions.vioce.index'
    ]);

    Route::post('/quistions/Voice/create', [
        'uses'  =>  'QuistionVioceController@create',
        'as'    =>  'quistions.vioce.create'
    ]);
    Route::post('/quistions/Voice/update', [
        'uses'  =>  'QuistionVioceController@update',
        'as'    =>  'quistions.vioce.update'
    ]);
    Route::get('/quistions/Voice/delete/{id}', [
        'uses'  =>  'QuistionVioceController@delete',
        'as'    =>  'quistions.vioce.delete'
    ]);

    //quistions Voice End

    //quistions Shape Start

    Route::get('/quistions/Shape', [
        'uses'  =>  'QuistionShapeController@index',
        'as'    =>  'quistions.shape.index'
    ]);

    Route::post('/quistions/Shape/create', [
        'uses'  =>  'QuistionShapeController@create',
        'as'    =>  'quistions.shape.create'
    ]);
    Route::post('/quistions/Shape/update', [
        'uses'  =>  'QuistionShapeController@update',
        'as'    =>  'quistions.shape.update'
    ]);
    Route::get('/quistions/Shape/delete/{id}', [
        'uses'  =>  'QuistionShapeController@delete',
        'as'    =>  'quistions.shape.delete'
    ]);

    //quistions Shape End

    //Quistions Vioce For Answers Text Start

    Route::get('/quistions/questions-voice/answers-text', [
        'uses'  =>  'QuistionVioceAnswerTextController@index',
        'as'    =>  'quistions.questions-voice.answers-text.index'
    ]);

    Route::post('/quistions/questions-voice/answers-text/create', [
        'uses'  =>  'QuistionVioceAnswerTextController@create',
        'as'    =>  'quistions.questions-voice.answers-text.create'
    ]);
    Route::post('/quistions/questions-voice/answers-text/update', [
        'uses'  =>  'QuistionVioceAnswerTextController@update',
        'as'    =>  'quistions.questions-voice.answers-text.update'
    ]);
    Route::get('/quistions/questions-voice/answers-text/delete/{id}', [
        'uses'  =>  'QuistionVioceAnswerTextController@delete',
        'as'    =>  'quistions.questions-voice.answers-text.delete'
    ]);

    //Quistions Vioce For Answers Text End

    //Questions Text  For Answers  Vioce Start

    Route::get('/quistions/questions-text/answers-voice', [
        'uses'  =>  'QuestionsTextAnswersVioceController@index',
        'as'    =>  'quistions.questions-text.answers-voice.index'
    ]);

    Route::post('/quistions/questions-text/answers-voice/create', [
        'uses'  =>  'QuestionsTextAnswersVioceController@create',
        'as'    =>  'quistions.questions-text.answers-voice.create'
    ]);
    Route::post('/quistions/questions-text/answers-voice/update', [
        'uses'  =>  'QuestionsTextAnswersVioceController@update',
        'as'    =>  'quistions.questions-text.answers-voice.update'
    ]);
    Route::get('/quistions/questions-text/answers-voice/delete/{id}', [
        'uses'  =>  'QuestionsTextAnswersVioceController@delete',
        'as'    =>  'quistions.questions-text.answers-voice.delete'
    ]);

    //Questions Text  For Answers  Vioce End


    //Questions Text  For Answers  Shape Start

    Route::get('/quistions/questions-text/answers-shape', [
        'uses'  =>  'QuestionsTextAnswersShapeController@index',
        'as'    =>  'quistions.questions-text.answers-shape.index'
    ]);

    Route::post('/quistions/questions-text/answers-shape/create', [
        'uses'  =>  'QuestionsTextAnswersShapeController@create',
        'as'    =>  'quistions.questions-text.answers-shape.create'
    ]);
    Route::post('/quistions/questions-text/answers-shape/update', [
        'uses'  =>  'QuestionsTextAnswersShapeController@update',
        'as'    =>  'quistions.questions-text.answers-shape.update'
    ]);
    Route::get('/quistions/questions-text/answers-shape/delete/{id}', [
        'uses'  =>  'QuestionsTextAnswersShapeController@delete',
        'as'    =>  'quistions.questions-text.answers-shape.delete'
    ]);

    //Questions Text  For Answers  Shape End


    //Questions shape  For Answers  shape Start

    Route::get('/quistions/questions-shape/answers-text', [
        'uses'  =>  'QuestionShapeAnswerTextController@index',
        'as'    =>  'quistions.questions-shape.answers-text.index'
    ]);

    Route::post('/quistions/questions-shape/answers-text/create', [
        'uses'  =>  'QuestionShapeAnswerTextController@create',
        'as'    =>  'quistions.questions-shape.answers-text.create'
    ]);
    Route::post('/quistions/questions-shape/answers-text/update', [
        'uses'  =>  'QuestionShapeAnswerTextController@update',
        'as'    =>  'quistions.questions-shape.answers-text.update'
    ]);
    Route::get('/quistions/questions-shape/answers-text/delete/{id}', [
        'uses'  =>  'QuestionShapeAnswerTextController@delete',
        'as'    =>  'quistions.questions-shape.answers-text.delete'
    ]);

    //Questions shape  For Answers  shape End




    // Answers Start
    Route::get('/answers', [
        'uses'  =>  'AnswerController@index',
        'as'    =>  'answers.index'
    ]);

    Route::post('/answers/create', [
        'uses'  =>  'AnswerController@create',
        'as'    =>  'answers.create'
    ]);
    Route::post('/answers/update', [
        'uses'  =>  'AnswerController@update',
        'as'    =>  'answer.update'
    ]);

    Route::get('/answers/delete/{id}', [
        'uses'  =>  'AnswerController@delete',
        'as'    =>  'answer.delete'
    ]);
    // Answers End

    // Answers Vioce Start
    Route::get('/answers/vioce', [
        'uses'  =>  'AnswerVioceController@index',
        'as'    =>  'answers.voice.index'
    ]);

    Route::post('/answers/voice/create', [
        'uses'  =>  'AnswerVioceController@create',
        'as'    =>  'answers.voice.create'
    ]);
    Route::post('/answers/voice/update', [
        'uses'  =>  'AnswerVioceController@update',
        'as'    =>  'answer.voice.update'
    ]);
    Route::get('/answers/vioce/delete/{id}', [
        'uses'  =>  'AnswerVioceController@delete',
        'as'    =>  'answer.voice.delete'
    ]);
    // Answers Vioce End


    // Answers Shape Start
    Route::get('/answers/shape', [
        'uses'  =>  'AnswerShapeController@index',
        'as'    =>  'answers.shape.index'
    ]);

    Route::post('/answers/shape/create', [
        'uses'  =>  'AnswerShapeController@create',
        'as'    =>  'answers.shape.create'
    ]);
    Route::post('/answers/shape/update', [
        'uses'  =>  'AnswerShapeController@update',
        'as'    =>  'answer.shape.update'
    ]);
    Route::get('/answers/shape/delete/{id}', [
        'uses'  =>  'AnswerShapeController@delete',
        'as'    =>  'answer.shape.delete'
    ]);
    // Answers Shape End

    // Answers text For Questions Vioce Start
    Route::get('/answers/question-vioce/answer-text', [
        'uses'  =>  'AnswerTextForQuestionVioceController@index',
        'as'    =>  'answers.question-vioce.answer-text.index'
    ]);

    Route::post('/answers/question-vioce/answer-text/create', [
        'uses'  =>  'AnswerTextForQuestionVioceController@create',
        'as'    =>  'answers.question-vioce.answer-text.create'
    ]);
    Route::post('/answers/question-vioce/answer-text/update', [
        'uses'  =>  'AnswerTextForQuestionVioceController@update',
        'as'    =>  'answer.question-vioce.answer-text.update'
    ]);
    Route::get('/answers/question-vioce/answer-text/delete/{id}', [
        'uses'  =>  'AnswerTextForQuestionVioceController@delete',
        'as'    =>  'answer.question-vioce.answer-text.delete'
    ]);
    // Answers text For Questions Vioce End
    // Answers Voice For Questions Text Start
    Route::get('/answers/question-text/answer-vioce', [
        'uses'  =>  'AnswerVoiceForQuestionTextController@index',
        'as'    =>  'answers.question-text.answer-voice.index'
    ]);

    Route::post('/answers/question-text/answer-vioce/create', [
        'uses'  =>  'AnswerVoiceForQuestionTextController@create',
        'as'    =>  'answers.question-text.answer-voice.create'
    ]);
    Route::post('/answers/question-text/answer-vioce/update', [
        'uses'  =>  'AnswerVoiceForQuestionTextController@update',
        'as'    =>  'answer.question-text.answer-voice.update'
    ]);
    Route::get('/answers/question-text/answer-vioce/delete/{id}', [
        'uses'  =>  'AnswerVoiceForQuestionTextController@delete',
        'as'    =>  'answer.question-text.answer-voice.delete'
    ]);
    // Answers text For Questions Vioce End



    // Answers shape For Questions Text Start
    Route::get('/answers/question-text/answer-shape', [
        'uses'  =>  'AnswerShapeQuestionsTextController@index',
        'as'    =>  'answers.question-text.answer-shape.index'
    ]);

    Route::post('/answers/question-text/answer-shape/create', [
        'uses'  =>  'AnswerShapeQuestionsTextController@create',
        'as'    =>  'answers.question-text.answer-shape.create'
    ]);
    Route::post('/answers/question-text/answer-shape/update', [
        'uses'  =>  'AnswerShapeQuestionsTextController@update',
        'as'    =>  'answer.question-text.answer-shape.update'
    ]);
    Route::get('/answers/question-text/answer-shape/delete/{id}', [
        'uses'  =>  'AnswerShapeQuestionsTextController@delete',
        'as'    =>  'answer.question-text.answer-shape.delete'
    ]);
    // Answers shape For Questions Vioce End

    // Answers text For Questions shape Start
    Route::get('/answers/question-shape/answer-text', [
        'uses'  =>  'AnswersTextQuestionsShapeController@index',
        'as'    =>  'answers.question-shape.answer-text.index'
    ]);

    Route::post('/answers/question-shape/answer-text/create', [
        'uses'  =>  'AnswersTextQuestionsShapeController@create',
        'as'    =>  'answers.question-shape.answer-text.create'
    ]);
    Route::post('/answers/question-shape/answer-text/update', [
        'uses'  =>  'AnswersTextQuestionsShapeController@update',
        'as'    =>  'answer.question-shape.answer-text.update'
    ]);
    Route::get('/answers/question-shape/answer-text/delete/{id}', [
        'uses'  =>  'AnswersTextQuestionsShapeController@delete',
        'as'    =>  'answer.question-shape.answer-text.delete'
    ]);
    // Answers text For Questions shape End




    // Answers End
});
/* End BackEnd Routes */
