<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Users;
use DB;
use Datetime;
use Input;
use Session;
use Connection;
use App\Http\Requests\CreatesubjectRequest;
use App\Commands\CreateSubjectCommand;
use App\Http\Requests\ReplyRequest;

class SubjectsController extends GlobalController
{
    public function ForumView()
    {
       $get_forums = DB::table('forum_cat')->get(); 
        return View('Runningshoes/pages/Forum')->with(
            array(
            'title' => $this->getTitle('Home'),
            'forum_cats' => $get_forums,
            ));
    }


    public function showSubjectsID($id)
    {
        $postsubjects = DB::table('subjects')->join('forum_cat', 'sub_cat_id', '=', 'Forum_cat_id')->where("Forum_cat_name","=", $id)->get();
        if (!count($postsubjects)) {
            return redirect('Products');
        } else
        $category = $id;
        return View('Runningshoes/pages/Forumid')->with(
            array(
            'postsubjects' => $postsubjects,
            'categori' => $category,
            ));
    }

    public function createSubjectView()
    {
        return View('Runningshoes.pages.New-subjects')->with(array(
            'getforumCats' => DB::table('forum_cat')->get(), 
            ));
    }

    public function createSubject(CreatesubjectRequest $request){
        
        $CreateSubject = new CreateSubjectCommand($request->create_sub_name, $request->form_control_content, $request->cat);
        $this->dispatch($CreateSubject);

       return back()->with('Subject', 'You Have Created A New Subject');       
    }

    public function postSubjectid($id)
    {
        //$postsubjectsid = DB::table('postsubject')->join('reply', 'post_subject_id', '=', 'reply_topic')->where("post_subject_id", "=", $id)->get();
        $postsubjectsid = DB::table('postsubject')->where('post_subject_id', '=',$id)->get();
        $replys = DB::table('reply')->where('reply_topic', '=',$id)->get();
        if (!count($postsubjectsid)) {
           return 'No';
        }else
        return View('Runningshoes/pages/PostSubjectid')->with(
            array(
            'title' => $this->getTitle('Home'),
            'postsubjectsid' => $postsubjectsid,
            'replys' => $replys,
            ));           
    }
    public function replyView($id){

        $postsubjects = DB::table('postsubject')->where('post_subject_id', '=', $id)->get();
        if(count($postsubjects) == 0){
            echo "No";  
        } else
        return View('Runningshoes/pages/replyView')->with(array(
            'title' => $this->getTitle('Home'),
            'postsubjects' => $postsubjects
            ));
    }

    public function createreply(ReplyRequest $request)
    {
        DB::table('reply')->insert(array(
            'reply_text' => $request->reply_content,
            'reply_date' => $this->getDate(),
            'reply_topic' => $request->reply_content_hidden,
            'reply_by' => Session::get('username'),
            )); 
        return back()->with('reply', 'Your Reply Have been added');
    }

    private function getDate()
    {
        $date = new DateTime();
        $date->format('Y-m-d H:i:s');
        return $date;
    }

    public function replyDestroy($id)
    {
       return $removereply = DB::table('reply')->where('reply_id', '=', $id)->where('reply_by','=', Session::get('username'))->delete();
    }

    public function Aktuella_Subjects()
    {
        $forumCats = DB::table('postsubject')->join('reply','post_id','=','reply_topic')->where('reply_date','>=', DB::raw('DATE_SUB(NOW(), INTERVAL 1 DAY)'))->get();
        return View('Runningshoes.pages.forum.aktuella')->with(
            array(
                'forumCats' => $forumCats, 
                ));
    }

    public function forumUserView($Username)
    {   
    //SELECT * FROM subjects INNER JOIN users ON subjects.subjects_username COLLATE utf8_general_ci = users.username COLLATE utf8_general_ci;    
        $getUser = User::all()->where('username','=', $Username);
        $getuserForum = DB::connection('mysql')->table('subjects')->join('postsubject','subjects_id','=','post_subject_id')->where('subjects_username','=', $Username)->get();
        return View('Runningshoes.pages.forum.User')->with(array(
            'getuserForum' => $getuserForum,
            'getUser' => $getUser,
            ));
    }
}
