<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Motor;

class Documento extends Model
{
    private $file;
    private $folderName;
    private $year;
    private $os;
    private $path;
    private $dbPath;

    public const TYPE_DOCUEMNTOS_INTERNOS = 8;
    //
    public function __construct($file="",$folderName="",$year="",$os="",$type="",$id_motor=""){
        if ($file != ""){
            $this->file = $file;
            $this->folderName = $folderName;
            $this->id_motor = $id_motor;
            
            $this->id_motor = $id_motor;
            $this->path = public_path().'/uploads/'.$year."-".$os."/".$folderName."/";
            $this->dbPath = '/uploads/'.$year."-".$os."/".$folderName."/";
        }

    }
    public function motor(){
        return $this->belongsTo('App\Motor','id_motor','id_motor');
    }
    public function fullSave()
    {

        $filenameWithExt = $this->file->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $this->file->getClientOriginalExtension();
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
        $this->file->move($this->path,$fileNameToStore);
        
        
        $this->titulo = $filename;
        $this->id_user = Auth::user()->id;
        $this->documento = $this->dbPath.$fileNameToStore;
        $this->save();
    }
}
