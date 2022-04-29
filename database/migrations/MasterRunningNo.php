<?php

class MasterRunningNo
{
    protected $table = 'master_running_no';

    public function up()
    {
        $column =  [
            'run_id' => array(
                'type' => 'BIGINT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
                'null' => FALSE,
            ),
            'run_prefix' => array(
                'type' => 'VARCHAR',
                'length' => 50,
                'null' => TRUE
            ),
            'run_suffix' => array(
                'type' => 'VARCHAR',
                'length' => 50,
                'null' => TRUE
            ),
            'run_type' => array(
                'type' => 'TINYINT',
                'default' => '0',
                'comment' => '1 - Application No, 2 - Student No, 3 - Invoice No, 4 - Receipt No',
                'default' => '1',
            ),
            'run_zerodigit' => array(
                'type' => 'INT',
                'null' => TRUE,
                'default' => '1',
            ),
            'run_currentno' => array(
                'type' => 'BIGINT',
                'unsigned' => TRUE,
                'null' => TRUE,
                'default' => '0',
            ),
        ];

        $key = [
            1 => ['type' => 'PRIMARY KEY', 'reference' => 'run_id'],
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