<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request)
    {
        // dump($request->berkas);
        // return "pemrosesan file upload disini";

        // if ($request->hasFile('berkas')) {
        //     echo "path(): ".$request->berkas->path();
        //     echo "<br>";
        //     echo "extension(): ".$request->berkas->extension();
        //     echo "<br>";
        //     echo "getClientOriginalExtension(): ".
        //         $request->berkas->getClientOriginalExtension();
        //     echo "<br>";
        //     echo "getMimeType(): ".$request->berkas->getMimeType();
        //     echo "<br>";
        //     echo "getClientOriginalName(): ".
        //         $request->berkas->getClientOriginalName();
        //     echo "<br>";
        //     echo "getSize(): ".$request->berkas->getSize();
        // }
        // else
        // {
        //     echo "Tidak ada berkas yang diupload";
        // }

        $request->validate([
            'berkas' => 'required|file|image|max:500',
        ]);

        $textfile=$request->berkas->getClientOriginalName();
        $namaFile='web-'.time().'.'.$textfile;

        $path = $request->berkas->move('gambar',$namaFile);
        $path =str_replace("\\","//",$path);
        echo "Variabel path berisi:$path <br>";

        $pathBaru=asset('gambar/'.$namaFile);
        echo "proses upload berhasil, data disimpan pada:$path";
        echo "<br>";
        echo "Tampilkan link: <a href='$pathBaru'>$pathBaru</a>";

        // $textfile=$request->berkas->getClientOriginalName();
        // $namaFile='web-'.time().'.'.$textfile;
        // $path = $request->berkas->storeAs('public',$namaFile);

        // $pathBaru=asset('storage/'.$namaFile);
        // echo "proses upload berhasil, data disimpan pada:$path";
        // echo "<br>";
        // echo "Tampilkan link: <a href='$pathBaru'>$pathBaru</a>";

        // echo $request->berkas->getClientOriginalName()."lolos validasi";
        // $textfile=$request->berkas->getClientOriginalName();
        // $namaFile='web-'.time().'-'.$textfile;
        // $path = $request->berkas->storeAs('uploads',$namaFile);
        // echo "proses upload berhasil, data disimpan pada:$path";

        // $namaFile=$request->berkas->getClientOriginalName();
        // $path = $request->berkas->storeAs('uploads',$namaFile);
        // echo "proses upload berhasil, data disimpan pada:$path";

        // $path = $request->berkas->store('uploads');
        // $path = $request->berkas->storeAs('uploads', 'berkas');
        // echo "Proses upload berhasil, file berada di: $path";
        // echo $request->berkas->getClientOriginalName()."lolos validasi";
    }

    public function fileUploadAssignment(){
        return view('file-upload-assignment');
    }

    public function prosesfileUploadAssignment(Request $request){
        $request->validate([
            'nama_berkas' => 'required|string',
            'berkas' => 'required|file|image|max:500',
        ]);
        $text = $request->berkas->getClientOriginalExtension();
        $textname = $request->nama_berkas.'.'.$text;

        $path = $request->berkas->move('gambar',$textname);
        $path = str_replace("\\","//",$path);

        $pathBaru = asset('gambar/'.$textname);
        echo "Gambar berhasil di upload ke <a href='$pathBaru'>$textname</a>";
        echo "<br>";
        echo "<img src='$pathBaru' alt='$textname' style='max-width: 500px'; height: auto;'>";
    }
}
