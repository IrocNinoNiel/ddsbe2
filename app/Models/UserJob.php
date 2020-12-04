<?php
    namespace App;

    use Illuminate\Database\Eloquent\Model;


    class UserJob extends Model{
        
        public $timestamps = false;
        protected $primaryKey = 'jobid';
        protected $table = 'tbljobs';
        // column sa table
        protected $fillable = [
            'jobname'
        ];
    }