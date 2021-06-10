<?php
 
namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramBotController extends Controller
{
public function updatedActivity()
    {
        $activity = Telegram::getUpdates();
        dd($activity);
    }
 
    public function sendMessage()
    {
        return view('telegram.message');
    }
 
    public function storeMessage(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required'
        ]);
 
        $text = "A new contact us query\n"
            . "<b>Email Address: </b>\n"
            . "$request->email\n"
            . "<b>Message: </b>\n"
            . $request->message;
 
        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
            'parse_mode' => 'HTML',
            'text' => $text
        ]);
 
        return redirect()->back();
    }
 
    public function sendPhoto()
    {
        return view('telegram.photo');
    }
 
    public function storePhoto(Request $request)
    {
        $request->validate([
            'file' => 'file|mimes:jpeg,png,gif'
        ]);
 
        $photo = $request->file('file');
 		$random = Str::random(10);

        Telegram::sendPhoto([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
            'photo' => InputFile::createFromContents(file_get_contents($photo->getRealPath()), $random . '.' . $photo->getClientOriginalExtension())
        ]);
 
        return redirect()->back();
    }
}


/*php artisan config:clear
php artisan cache:clear
composer dump-autoload
php artisan view:clear
php artisan route:clear*/