<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Penerbit extends Model
{
    use HasFactory;
    protected $table = 'penerbit';
    protected $primaryKey = 'penerbit_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'penerbit_id',
        'penerbit_nama',
        'penerbit_alamat',
        'penerbit_notelp',
        'penerbit_email',
    ];

    protected static function createPenerbit($data)
    {
       return self::create($data);
       return DB::table('penerbit')->insert($data);

    }

    protected static function readPenerbit()
    {
        $data = DB::table('penerbit')->paginate(5);
        return $data;;
    }

    protected static function updatePenerbit($id, $data)
    {
        //$penerbit = self::find($id);
        //if ($penerbit) {
            //$penerbit->update($data);
           // return $penerbit;
       // }
        //return null;

        $penerbit = DB::table('penerbit')->where('penerbit_id', $id)->first();
        if ($penerbit) {
        DB::table('penerbit')->where('penerbit_id', $id)->update($data);
        return $data;
        }
        return null;

    }

    protected static function readPenerbitById($id)
    {
        //$penerbit = self::find($id);
        //return $penerbit;
        $penerbit = DB::table('penerbit')->where('penerbit_id', $id)->first();
        return $penerbit;

    }

    protected static function deletePenerbit($id)
    {
       //return self::destroy($id);
       return DB::table('penerbit')->where('penerbit_id', $id)->delete();
    }
}
