<?php
/**
 * Created by PhpStorm.
 * User: cuongpm00
 * Date: 10/12/2016
 * Time: 3:37 PM
 */

namespace App\Repositories;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\VtUser;

trait _MongoRepository
{

    public function paginate($input)
    {
        $page = 1;
        $per_page = 100;
        if (isset($input['page'])) $page = (int)$input['page'];
        if (isset($input['per_page'])) $per_page = (int)$input['per_page'];
        $skip = $page * $per_page - $per_page;

        $filter = $this->model->refine($input);

        if ($filter == 'is_active: 1'){
            $query = "db.getCollection('" . $this->model->collection . "').find({" . $filter . "}).sort({id:-1}).skip($skip).limit($per_page).toArray()";
            $m = new \MongoClient('mongodb://10.60.139.167:8721,10.60.139.172:8721,10.60.139.180:8721/Keeng?replicaSet=keeng02&readPreference=secondary', array("socketTimeoutMS" => "90000"));
            $db = $m->selectDB('Keeng');
            $collection = new \MongoCollection($db, $this->model->table);
            $fruitQuery = array('is_active' => 1);
            $cursor = $collection->find(array('is_active' => 1))->sort(array('id' => -1))->skip($skip)->limit($per_page);
            $arrayC= iterator_to_array($cursor);
            if (isset ($arrayC)){
                $VtStatuses = collect($arrayC);
                $VtStatuses->currentPage = $page;
                $VtStatuses->per_page = $per_page;
                $VtStatuses->link = route('VtStatuses.index');
                return $VtStatuses;
            }
        }
        $searchQ1 = explode(', ', $filter);
        $searchIden = explode(': ', $searchQ1[0]);

        if ($searchIden[0] == 'item_id'){
            $query = "db.getCollection('" . $this->model->collection . "').find({" . $filter . "}).sort({id:-1}).skip($skip).limit($per_page).toArray()";
            $m = new \MongoClient('mongodb://10.60.139.167:8721,10.60.139.172:8721,10.60.139.180:8721/Keeng?replicaSet=keeng02&readPreference=secondary', array("socketTimeoutMS" => "90000"));
            $db = $m->selectDB('Keeng');
            $collection = new \MongoCollection($db, $this->model->table);
            $cursor = $collection->find(array('item_id' => intval($searchIden[1]), 'is_active' => 1))->sort(array('id' => -1))->skip($skip)->limit($per_page);
            $arrayC= iterator_to_array($cursor);
            if (isset ($arrayC)){
                $VtStatuses = collect($arrayC);
                $VtStatuses->currentPage = $page;
                $VtStatuses->per_page = $per_page;
                $VtStatuses->link = route('VtStatuses.index');
                return $VtStatuses;
            }
        }

        if ($searchIden[0] == 'item_type'){
            $query = "db.getCollection('" . $this->model->collection . "').find({" . $filter . "}).sort({id:-1}).skip($skip).limit($per_page).toArray()";
            $m = new \MongoClient('mongodb://10.60.139.167:8721,10.60.139.172:8721,10.60.139.180:8721/Keeng?replicaSet=keeng02&readPreference=secondary', array("socketTimeoutMS" => "90000"));
            $db = $m->selectDB('Keeng');
            $collection = new \MongoCollection($db, $this->model->table);
            $cursor = $collection->find(array('item_type' => intval($searchIden[1]), 'is_active' => 1))->sort(array('id' => -1))->skip($skip)->limit($per_page);
            $arrayC= iterator_to_array($cursor);
            if (isset ($arrayC)){
                $VtStatuses = collect($arrayC);
                $VtStatuses->currentPage = $page;
                $VtStatuses->per_page = $per_page;
                $VtStatuses->link = route('VtStatuses.index');
                return $VtStatuses;
            }
        }

        if ($searchIden[0] == 'user_id'){

            $query = "db.getCollection('" . $this->model->collection . "').find({" . $filter . "}).sort({id:-1}).skip($skip).limit($per_page).toArray()";
            $m = new \MongoClient('mongodb://10.60.139.167:8721,10.60.139.172:8721,10.60.139.180:8721/Keeng?replicaSet=keeng02&readPreference=secondary', array("socketTimeoutMS" => "90000"));
            $db = $m->selectDB('Keeng');
            $collection = new \MongoCollection($db, $this->model->table);
            $cursor = $collection->find(array('user_id' => intval($searchIden[1]), 'is_active' => 1))->sort(array('id' => -1))->skip($skip)->limit($per_page);
            $countCur = $collection->find(array('user_id' => intval($searchIden[1]), 'is_active' => 1))->count();
            echo 'Số lượng là '.$countCur.'';
            $arrayC= iterator_to_array($cursor);
            if (isset ($arrayC)){
                $VtStatuses = collect($arrayC);
                $VtStatuses->currentPage = $page;
                $VtStatuses->per_page = $per_page;
                $VtStatuses->link = route('VtStatuses.index');
                return $VtStatuses;
            }
        }

        if ($searchIden[0] == 'status_id'){
            $query = "db.getCollection('" . $this->model->collection . "').find({" . $filter . "}).sort({id:-1}).skip($skip).limit($per_page).toArray()";
            $m = new \MongoClient('mongodb://10.60.139.167:8721,10.60.139.172:8721,10.60.139.180:8721/Keeng?replicaSet=keeng02&readPreference=secondary', array("socketTimeoutMS" => "90000"));
            $db = $m->selectDB('Keeng');
            $collection = new \MongoCollection($db, $this->model->table);
            $cursor = $collection->find(array('status_id' => intval($searchIden[1]), 'is_active' => 1))->sort(array('id' => -1))->skip($skip)->limit($per_page);
            $arrayC= iterator_to_array($cursor);
            if (isset ($arrayC)){
                $VtStatuses = collect($arrayC);
                $VtStatuses->currentPage = $page;
                $VtStatuses->per_page = $per_page;
                $VtStatuses->link = route('VtStatuses.index');
                return $VtStatuses;
            }
        }

        $searchQ = explode(': ', $searchQ1[0]);
        $m = new \MongoClient('mongodb://10.60.139.167:8721,10.60.139.172:8721,10.60.139.180:8721/Keeng?replicaSet=keeng02&readPreference=secondary', array("socketTimeoutMS" => "90000"));
        $db = $m->selectDB('Keeng');
        $collection = new \MongoCollection($db, $this->model->table);
        $regex = new \MongoRegex($searchQ[1]);
        $fruitQuery = array($this->model->table => $regex);
        $cursor = $collection->find(array($this->model->table => $regex, 'is_active' => 1))->sort(array('id' => -1))->skip($skip)->limit($per_page);
        $countCur = $collection->find(array($this->model->table => $regex, 'is_active' => 1))->count();
        $arrayC= iterator_to_array($cursor);
        echo 'Số lượng từ là '.$countCur.'';
        if (isset ($arrayC)){
            $VtStatuses = collect($arrayC);
            $VtStatuses->currentPage = $page;
            $VtStatuses->per_page = $per_page;
            $VtStatuses->link = route('VtStatuses.index');
            return $VtStatuses;
        }
        $query = "db.getCollection('" . $this->model->collection . "').find({" . $filter . "}).sort({id:-1}).skip($skip).limit($per_page).toArray()";

//        $result = $this->DB->execute($query);

        /*if(request()->ajax())
        {
            $queryCount = "db.getCollection('" . $this->model->collection . "').find({" . $filter . "}).count()";
            $resultCount = $this->DB->execute($queryCount);
            echo $resultCount['retval'];
        }*/

        if (isset($result['retval'])) {
            $VtStatuses = collect($result['retval']);
            $VtStatuses->currentPage = $page;
            $VtStatuses->per_page = $per_page;
            $VtStatuses->link = route('VtStatuses.index');
            return $VtStatuses;
        }
        return [];
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findIn($ids)
    {
        return $this->model->findIn($ids);
    }

    public function inactiveMulti($ids)
    {
        $setActive = '{ $set:{  is_active: 0 }}';
        $query = "db.getCollection('" . $this->model->collection . "').updateMany({" . $this->model->findIn($ids) . "}, $setActive )";
        $result = $this->DB->execute($query);
        return $result;
    }

    public function active($id)
    {
        $query = "db.getCollection('" . $this->model->collection . "').find({" . $this->model->findIn($id) . "}).update({is_active: 0})";
        $result = $this->DB->execute($query);
        return $result;
    }
    public function adviseError($input){
        $fromDateOrigin = $input['datetimepicker4'];
        $toDateOrigin = $input['datetimepicker5'];
        $fromDate = new \MongoDate(strtotime($input['datetimepicker4']));
        $toDate = new \MongoDate(strtotime($input['datetimepicker5']));;
        $execute = $this->DB->execute('db.status.find({is_active:1, item_id:600, item_type:600, time: {$gte: '.$fromDate->sec.', $lte: '.$toDate->sec.'} }).toArray();');
        $dataArray = $execute['retval'];
        Excel::create('reportExcel', function($excel) use($dataArray, $fromDateOrigin, $toDateOrigin) {
            $excel->sheet('Bao loi Gop y', function($sheet) use($dataArray, $fromDateOrigin, $toDateOrigin) {
                $sheet->row(1, array(
                    'Danh sách lỗi, góp ý'
                ));
                $sheet->row(2, array(
                    'Từ ngày', $fromDateOrigin
                ));
                $sheet->row(3, array(
                    'Đến ngày', $toDateOrigin
                ));
                $sheet->row(4, array(
                    'Thời gian', 'SDT', 'Kênh', 'Loại lỗi', 'Nội dung'
                ));
                foreach($dataArray as $row){
                    $phoneNumber = VtUser::where('id', '=', $row['user_id'])->pluck('msisdn');
                    $data[] = array($row['created_at'], $phoneNumber[0], $row['channel'], 'Góp ý - Báo lỗi', $this->clean($row['status']));
                }
                $sheet->fromArray($data, null, 'A5', false, false);
            });
        })->export('xls');
    }
    public function clean($string) {
        $string = preg_replace('/[^\p{L}\p{N}\s]/u', '', $string); // Removes special chars.

        return preg_replace('/-+/', ' ', $string); // Replaces multiple hyphens with single one.
    }
}