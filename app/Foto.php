<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Motor;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;

class Foto extends Model
{
    //
    private $file;
    private $folderName;
    private $year;
    private $os;
    private $path;
    private $dbPath;

    public const TYPE_INGRESO = 2;
    public const TYPE_DESARMADO = 3;
    public const TYPE_CAUSA_FALLO = 4;
    public const TYPE_TRABAJO_ELECTRICO = 5;
    public const TYPE_COJINETES = 6;
    public const TYPE_DIAGNOSTICO = 10;
    
    
    
    public function __construct($file="",$folderName="",$year="",$os="",$type="",$id_motor=""){
        if ($file != ""){
            $this->file = $file;
            $this->folderName = $folderName;
            $this->id_motor = $id_motor;
            $this->type = $type;
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
        $image_resize = Image::make($this->path.$fileNameToStore);
        $image_resize->resize(null, 400, function ($constraint) {
            $constraint->aspectRatio();
            //$constraint->upsize();
        });
        if (!File::exists($this->path."thumb/"))
            File::makeDirectory($this->path."thumb/");
        $image_resize->save($this->path."thumb/".$fileNameToStore);
        $this->thumb = $this->dbPath."thumb/".$fileNameToStore;
        
        $this->foto = $this->dbPath.$fileNameToStore;
        $this->save();
    }
    
}
