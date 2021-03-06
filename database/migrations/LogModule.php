<?php

class LogModule
{
    protected $table = 'log_record';

    public function up()
    {
        $column =  [
            'log_id' => array(
                'type' => 'BIGINT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE,
            ),
            'log_event' => array(
                'type' => 'VARCHAR',
                'length' => 250,
                'null' => TRUE
            ),
            'log_payload' => array(
                'type' => 'LONGTEXT',
                'null' => TRUE,
            ),
            'log_remark' => array(
                'type' => 'VARCHAR',
                'length' => 250,
                'null' => TRUE
            ),
            'log_type' => array(
                'type' => 'VARCHAR',
                'length' => 15,
                'null' => TRUE,
                'default' => 'info',
                'after' => 'log_remark'
            ),
            'log_date' => array(
                'type' => 'DATETIME',
                'null' => TRUE
            ),
            'user_id' => array(
                'type' => 'BIGINT',
                'unsigned' => TRUE,
                'comment' => 'Refer table user',
                'null' => TRUE
            ),
        ];

        $key = [
            1 => ['type' => 'PRIMARY KEY', 'reference' => 'log_id'],
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
            'LOG_USER' => array(
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