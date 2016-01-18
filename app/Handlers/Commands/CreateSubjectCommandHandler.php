<?php
namespace App\Handlers\Commands;
use DB;
use Session;
use DateTime;
use App\Commands\CreateSubjectCommand;
use Illuminate\Queue\InteractsWithQueue;

class CreateSubjectCommandHandler
{
    public function __construct()
    {
        //
    }

    public function handle(CreateSubjectCommand $command)
    {
        $this->insertsubject($command);
        $this->insertqty($command);
        $postSubTables = DB::table('postsubject')->join('subjects', 'post_id', '=', 'post_id')->get();
        foreach ($postSubTables as $postSubTable) {
            $CreateSub = DB::table('postsubject')->insert([
                'post_name' => $command->name,
                'post_content' => $command->text,
                'post_date' => $this->getDate(),
                'post_by' => Session::get('username'),
                'post_subject_id' => $postSubTable->subjects_id,
                ]);
            return $CreateSub;
        }
    }

    public function insertsubject(CreateSubjectCommand $command)
    {

        $CreateSubi = DB::table('subjects')->insert([
            'subjects_name' => $command->name,
            'subjects_date' => $this->getDate(),
            'sub_cat_id' => $command->post_cat_id,
            ]);
            return $CreateSubi;
    }

    public function insertqty(CreateSubjectCommand $command)
    {
        $forum_cats = DB::table('forum_cat')->get();
        foreach ($forum_cats as $forum_cat) {
            if ($forum_cat->Forum_cat_id == $command->post_cat_id) {
                $getFqty = $forum_cat->forum_qty += 1;
                DB::table('forum_cat')->where('Forum_cat_id', "=", $command->post_cat_id)->update(
                    array(
                        'forum_qty' => $getFqty,
                    ));
            }
        }
    }

    private function getDate()
    {
        $date = new DateTime();
        $date->format('Y-m-d H:i:s');
        return $date;
    }
}
