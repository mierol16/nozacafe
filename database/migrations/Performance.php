<?php

class Performance
{
    protected $table = 'staff_performance';

    public function up()
    {
        $column =  [
            'performance_id' => array(
                'type' => 'BIGINT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE,
            ),
            'user_id' => array(
                'type' => 'BIGINT',
                'unsigned' => TRUE,
                'comment' => 'Refer table user',
                'null' => TRUE
            ),
            'performance_date' => array(
                'type' => 'DATE',
                'null' => TRUE
            ),
            'performance_year' => array(
                'type' => 'VARCHAR',
                'length' => 15,
                'null' => TRUE,
            ),
            'attendance_mark' => array(
                'type' => 'INT',
                'length' => 11,
                'null' => TRUE,
            ),
            'cooperation_mark' => array(
                'type' => 'INT',
                'length' => 11,
                'null' => TRUE,
            ),
            'responsibility_mark' => array(
                'type' => 'INT',
                'length' => 11,
                'null' => TRUE,
            ),
            'behavior_mark' => array(
                'type' => 'INT',
                'length' => 11,
                'null' => TRUE,
            ),
            'trust_mark' => array(
                'type' => 'INT',
                'length' => 11,
                'null' => TRUE,
            ),
            'total_mark' => array(
                'type' => 'INT',
                'length' => 11,
                'null' => TRUE,
            ),
            'performance_gred' => array(
                'type' => 'INT',
                'length' => 11,
                'null' => TRUE,
            ),
            'performance_status' => array(
                'type' => 'TINYINT',
                'null' => TRUE,
                'comment' => '0-not view, 1-view by staff',
                'default' => '0',
            ),
            'performance_comment' => array(
                'type' => 'VARCHAR',
                'length' => 255,
                'null' => TRUE,
            ),
            'performance_admin_remark' => array(
                'type' => 'VARCHAR',
                'length' => 255,
                'null' => TRUE,
            ),
            'admin_remark_date' => array(
                'type' => 'DATE',
                'null' => TRUE
            ),
            'performance_staff_remark' => array(
                'type' => 'VARCHAR',
                'length' => 255,
                'null' => TRUE,
            ),
            'staff_remark_date' => array(
                'type' => 'DATE',
                'null' => TRUE
            ),
        ];

        $key = [
            1 => ['type' => 'PRIMARY KEY', 'reference' => 'performance_id'],
            2 => ['type' => 'INDEX', 'reference' => 'user_id'],
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
            'PERFORMANCE_USER' => array(
                'FOREIGN_KEY' => 'user_id',
                'REFERENCES_TABLE' => 'user',
                'REFERENCES_KEY' => 'user_id',
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