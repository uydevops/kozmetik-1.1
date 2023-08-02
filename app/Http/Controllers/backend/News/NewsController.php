<?php

namespace App\Http\Controllers\backend\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;

class NewsController extends Controller
{




    public function newsDelete(int $id)
    {

        $newsDelete = News::where('id', $id)->first();
        $newsDelete->delete();
        return redirect()->back()->with('success', 'Haber Başarıyla Silindi');
    }

    public function newsAdd(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:160',
            'keywords' => 'required|max:160',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:passive,active',
        ]);

        // Başlık üzerinde slug oluşturma
        $slug = Str::slug($request->title);

        // Eğer aynı slug'lı bir haber varsa, benzersiz bir slug oluşturun
        $count = 2;
        while (News::where('slug', $slug)->exists()) {
            $slug = Str::slug($request->title) . '-' . $count;
            $count++;
        }

        // Haberi veritabanına kaydetme
        $image = $request->file('image');

        // Eğer fotoğraf gönderildiyse işlem yapın
        if ($image) {
            // Fotoğrafın adını değiştirin (isteğe bağlı olarak, özelleştirebilirsiniz)
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Fotoğrafı public klasörü altındaki uploads klasörüne taşıyın
            $image->move(public_path('uploads'), $imageName);

            // Haber nesnesini oluştururken, resmin adını veritabanına kaydedin
            $news = new News();
            $news->title = $request->title;
            $news->description = $request->description;
            $news->keywords = $request->keywords;
            $news->content = $request->content;
            $news->image = 'uploads/' . $imageName; // Veritabanına sadece dosya adını kaydediyoruz, yolu değil.
            $news->slug = $slug;
            $news->status = $request->status;
            $news->save();
        } else {
            // Eğer fotoğraf gönderilmediyse, sadece haber bilgilerini kaydedin
            $news = new News();
            $news->title = $request->title;
            $news->description = $request->description;
            $news->keywords = $request->keywords;
            $news->content = $request->content;
            $news->slug = $slug;
            $news->status = $request->status;
            $news->save();
        }

        return redirect()->route('admin.newsList')->with('success', 'Haber başarıyla eklendi.');
    }


    public function newsEditForm()
    {

      return view('admin.panel.newsEdit');
    }

}
