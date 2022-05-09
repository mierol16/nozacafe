<?php

class StaffLeave
{
    protected $table = 'staff_leave';

    public function up()
    {
        $column =  [
            'staff_leave_id' => array(
                'type' => 'BIGINT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE,
            ),
            'config_leave_id' => array(
                'type' => 'VARCHAR',
                'length' => 150,
                'null' => TRUE,
            ),
            'leave_no' => array(
                'type' => 'VARCHAR',
                'length' => 50,
                'null' => TRUE,
                'comment' => 'generate by system and only generate for leave application',
            ),
            'leave_date_from' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
            'leave_date_to' => array(
                'type' => 'DATE',
                'null' => TRUE,
            ),
            'leave_duration' => array(
                'type' => 'VARCHAR',
                'length' => 150,
                'null' => TRUE,
            ),
            'leave_status' => array(
                'type' => 'TINYINT',
                'length' => 4,
                'null' => TRUE,
            ),
            'leave_remark' => array(
                'type' => 'VARCHAR',
                'length' => 255,
                'null' => TRUE,
            ),
            'user_id' => array(
                'type' => 'BIGINT',
                'unsigned' => TRUE,
                'comment' => 'Refer table user',
                'null' => TRUE
            ),
        ];

        $key = [
            1 => ['type' => 'PRIMARY KEY', 'reference' => 'staff_leave_id'],
            2 => ['type' => 'INDEX', 'reference' => 'user_id'],
            3 => ['type' => 'INDEX', 'reference' => 'config_leave_id'],
        ];

        migrate($this->table, $column, $key);
        echo "Table <b style='color:red'><i>{$this->table}</i></b> migrate running succesfully <br>";
    }

    public function down()
    {
        dropTable($this->table);
        echo "Table <b style='color:red'><i>{$this->table}</i></b> drop succesfully <br>";
    }

    public function relation()
    {
        $relation = [
            'LEAVE_USER' => array(
                'FOREIGN_KEY' => 'user_id',
                'REFERENCES_TABLE' => 'user',
                'REFERENCES_KEY' => 'user_id',
                'ON_DELETE' => 'CASCADE',
                'ON_UPDATE' => 'NO ACTION',
            ),
            'LEAVE_CONFIG' => array(
                'FOREIGN_KEY' => 'config_leave_id',
                'REFERENCES_TABLE' => 'config_leave',
                'REFERENCES_KEY' => 'config_leave_id',
                'ON_DELETE' => 'CASCADE',
                'ON_UPDATE' => 'NO ACTION',
            ),
        ];

        addRelation($this->table, $relation);
        echo "Table <b style='color:red'><i>{$this->table}</i></b> relation added <br>";
    }
}

// type => INT, TINYINT, BIGINT, CHAR, VARCHAR, TEXT, DATE, YEAR, TIMESTAMP, DATE, TIME, DATETIME, DECIMAL, FLOAT, BOOLEAN, ENUM
// unsigned => TRUE / FALSE
// auto_increment => TRUE / FALSE
// null => TRUE / FALSE
// length
// comment
// default
// rename => (only use to change column name)
// after => (add column after tablename)
// drop => TRUE (remove if dont want to drop)