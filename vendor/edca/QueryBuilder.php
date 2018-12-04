<?php

namespace Core;


class QueryBuilder
{
    private $select;
    private $table_join;
    private $where;
    private $where_in;
    private $where_not;
    private $where_null;
    private $where_notnull;
    private $where_or;
    private $where_count = 0;
    private $greater;
    private $lower;
    private $like;
    private $likedata;
    private $order_by;
    private $group_by;
    private $limit;
    private $set;
    private $between;
    private $between_std;

    public function getQuery($table, $custom_query = NULL)
    {
        $query = NULL;
        if ($table) {
            if ($custom_query) {
                $query = $custom_query;
            } else {
                $query = "SELECT ";
                if (is_array($this->select)) {
                    $s = 0;
                    foreach ($this->select as $sel) {
                        if ($s != 0) {
                            $query .= ", ";
                        }
                        $query .= $sel . " ";
                        $s++;
                    }
                } else {
                    $query .= "* ";
                }
                $query .= "FROM " . $table . " ";
                if ($this->table_join) {
                    foreach ($this->table_join as $tbl => $on_tbl) {
                        $query .= $tbl . " ON " . $on_tbl . " ";
                    }
                }
                if (is_array($this->where)) {
                    $query .= "WHERE ";
                    foreach ($this->where as $whr => $val) {
                        if ($this->where_count > 0) {
                            $query .= "AND ";
                        }
                        $query .= $whr . "= '" . $val . "' ";
                        $this->where_count++;
                    }
                }
                if (is_array($this->where_in)) {
                    $wi = 1;
                    if ($this->where_count <= 0) {
                        $query .= "WHERE ";
                        $wi = 0;
                    }
                    foreach ($this->where_in as $whi => $whei) {
                        if ($wi > 0) {
                            $query .= "AND ";
                        }
                        $query .= $whi . " IN (" . $whei . ") ";
                        $wi++;
                        $this->where_count++;
                    }
                }
                if (is_array($this->where_not)) {
                    $notw = 1;
                    if ($this->where_count <= 0) {
                        $query .= "WHERE ";
                        $notw = 0;
                    }
                    foreach ($this->where_not as $notwe => $not) {
                        if ($notw != 0) {
                            $query .= "AND ";
                        }
                        $query .= $notwe . " != " . $not . " ";
                        $notw++;
                        $this->where_count++;
                    }
                }
                if (is_array($this->where_null)) {
                    $wn = 1;
                    if ($this->where_count <= 0) {
                        $query .= "WHERE ";
                        $wn = 0;

                    }
                    foreach ($this->where_null as $whrn => $val) {
                        if ($wn != 0) {
                            $query .= "AND ";

                        }
                        $query .= $val . " IS NULL ";
                        $wn++;
                        $this->where_count++;
                    }

                }
                if (is_array($this->where_notnull)) {
                    $nn = 1;
                    if ($this->where_count <= 0) {
                        $query .= "WHERE ";
                        $nn = 0;

                    }
                    foreach ($this->where_notnull as $whrnn => $val) {
                        if ($nn != 0) {
                            $query .= "AND ";

                        }
                        $query .= $val . " IS NOT NULL ";
                        $nn++;
                        $this->where_count++;
                    }

                }
                if (is_array($this->where_or)) {
                    $nn = 1;
                    if ($this->where_count <= 0) {
                        $query .= "WHERE ";
                        $nn = 0;

                    }
                    foreach ($this->where_or as $whrnn => $val) {
                        if ($nn != 0) {
                            $query .= "AND ";

                        }
                        $query .= "(" . $val . ")";
                        $nn++;
                        $this->where_count++;
                    }

                }
                if (is_array($this->greater)) {
                    $gr = 1;
                    if ($this->where_count <= 0) {
                        $query .= "WHERE ";
                        $gr = 0;
                    }
                    foreach ($this->greater as $great => $gre) {
                        foreach ($gre as $uni_gre) {
                            if ($gr != 0) {
                                $query .= "AND ";
                            }
                            $query .= $great . " <= " . $uni_gre . " ";
                            $gr++;
                            $this->where_count++;
                        }
                    }
                }
                if (is_array($this->lower)) {
                    $lw = 1;
                    if ($this->where_count <= 0) {
                        $query .= "WHERE ";
                        $lw = 0;
                    }
                    foreach ($this->lower as $lowe => $low) {
                        foreach ($low as $uni_low) {
                            if ($lw != 0) {
                                $query .= "AND ";
                            }
                            $query .= $lowe . " >= " . $uni_low . " ";
                            $lw++;
                            $this->where_count++;
                        }
                    }
                }
                if (is_array($this->like)) {
                    $j = 1;
                    if ($this->where_count <= 0) {
                        $query .= "WHERE ";
                        $j = 0;
                    }
                    foreach ($this->like as $lik => $lk) {
                        if ($j != 0) {
                            $query .= "AND ";
                        }
                        $query .= $lik . " LIKE '%" . $lk . "%' ";
                        $j++;
                        $this->where_count++;
                    }
                }
                if (is_array($this->likedata)) {
                    $jl = 1;
                    if ($this->where_count <= 0) {
                        $query .= "WHERE ";
                        $jl = 0;
                    }
                    foreach ($this->likedata as $likd => $lkd) {
                        if ($jl != 0) {
                            $query .= "AND ";
                        }
                        $query .= $likd . " BETWEEN '" . $lkd . " 00:00:00' AND '" . $lkd . " 23:59:59'";
                        $jl++;
                        $this->where_count++;
                    }
                }
                if(is_array($this->between)){
                    $bt = 1;
                    if($this->where_count <= 0){
                        $query .= "WHERE ";
                        $bt = 0;
                    }
                    if($bt != 0) {
                        $query .= " AND ";
                    }
                    $query .= "(";
                    foreach($this->between as $btvals){
                        $query .= "(".$btvals['ini'] . " BETWEEN " . $btvals['field'] . " AND ".$btvals['field2'].") OR";
                        $query .= "(".$btvals['fim'] . " BETWEEN " . $btvals['field'] . " AND ".$btvals['field2'].")";
                        $bt++;
                    }
                    $query .= ")";
                }
                if(is_array($this->between_std)){
                    $bt_std = 1;
                    if($this->where_count <= 0){
                        $query .= "WHERE ";
                        $bt_std = 0;

                    }
                    foreach($this->between_std as $bte_std => $val){
                        if($bt_std != 0){
                            $query .= "AND ";

                        }
                        $query .= $bte_std." BETWEEN ".$val['ini']." AND ".$val['fim'];
                        $bt_std++;

                    }
                }
                if ($this->group_by) {
                    $query .= "GROUP BY " . $this->group_by . " ";
                }
                if ($this->order_by) {
                    $query .= "ORDER BY " . $this->order_by . " ";
                }

                if ($this->limit) {
                    $query .= "LIMIT " . $this->limit . " ";
                }
            }
        }
        return $query;
    }

    public function getQueryInsert($table, $postData){
        if(is_array($postData)){
            $query = "INSERT INTO ".$table." (";
            $i = 0;
            $query_values = NULL;
            foreach($postData as $ins => $value){
                if($i != 0){
                    $query .= ", ";
                    $query_values .= ", ";
                }
                $query .= $ins;
                $query_values .= "'".$value."'";
                $i++;
            }
            $query .= ") VALUES (".$query_values.")";
            return $query;
        }
        return FALSE;
    }

    public function getQueryUpdate($table){
        if(is_array($this->set) && is_array($this->where)){
            $query = "UPDATE ".$table." SET ";
            $i = 0;
            foreach($this->set as $set => $val){
                if($i != 0){
                    $query .= ", ";
                }
                $query .= $set."= '".$val."' ";
                $i++;
            }
            $query .= "WHERE ";
            $j = 0;
            foreach($this->where as $whr => $val){
                if($j != 0){
                    $query .= "AND ";
                }
                $query .= $whr."= '".$val."' ";
                $j++;
            }

            return $query;
        }
        return FALSE;
    }

    public function getQueryDelete($table){
        if($table && is_array($this->where)){
            $query = "DELETE FROM ".$table;
            $query .= " WHERE ";
            $j = 0;
            foreach($this->where as $whr => $val){
                if($j != 0){
                    $query .= " AND ";
                }
                $query .= $whr." = ".$val;
                $j++;
            }
            return $query;
        }
    }

    public function select($fields)
    {
        $this->select[] = $fields;
        return $this;
    }

    public function tableJoin($table, $on_table, $direction)
    {
        $this->table_join[$direction . " JOIN " . $table] = $on_table;
        return $this;
    }

    public function where($field, $value)
    {
        $this->where[$field] = $value;
        return $this;
    }

    public function where_in($field, $value)
    {
        $this->where_in[$field] = $value;
        return $this;
    }

    public function where_not($field, $value)
    {
        $this->where_not[$field] = $value;
        return $this;
    }

    public function where_null($field)
    {
        $this->where_null[$field] = $field;
        return $this;
    }

    public function where_notnull($field)
    {
        $this->where_notnull[$field] = $field;
        return $this;
    }

    public function where_or($field)
    {
        $this->where_or[$field] = $field;
        return $this;
    }

    public function greater($field, $value)
    {
        $this->greater[$field][] = $value;
        return $this;
    }

    public function lower($field, $value)
    {
        $this->lower[$field][] = $value;
        return $this;
    }

    public function like($field, $value)
    {
        $this->like[$field] = $value;
        return $this;
    }

    public function likedata($field, $value)
    {
        $this->likedata[$field] = $value;
        return $this;
    }

    public function order_by($field, $direction)
    {
        $this->order_by = $field . " " . $direction;
        return $this;
    }

    public function group_by($field)
    {
        $this->group_by = $field;
        return $this;
    }

    public function limit($value, $offset = NULL)
    {
        if ($offset) {
            $this->limit = $value . " OFFSET " . $offset;
        } else {
            $this->limit = $value;
        }
        return $this;
    }
    public function set($field = NULL, $value = NULL){
        if($field && $value){
            $this->set[$field] = $value;
        }
    }

    public function between($field = NULL, $field2, $value_ini = NULL, $value_fim = NULL){
        if($field && $value_ini && $value_fim){
            $this->between[] = array('field' => $field, 'field2' => $field2, 'ini' => $value_ini, 'fim' => $value_fim);
        }
    }

    public function between_std($field = NULL, $value_ini = NULL, $value_fim = NULL){
        if($field && $value_ini && $value_fim){
            $this->between_std[$field] = array('ini' => $value_ini, 'fim' => $value_fim);
        }
    }
}