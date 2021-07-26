<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            [
                'object_email' => 'Artists House - CENTRUM - Campo de fiori',
                'content' => "Salve, la contattarla in merito al suo annuncio. Volevo chiederle se l'appartamento è disponibile per la seconda settimana di agosto. grazie mille",
                 'email_sender' => 'mario@gmail.com',
                'accomodation_id' => '2',
            ],
            [
                'object_email' => "Intero alloggio (casa)",
                'content' => "Salve, la contattarla in merito al suo annuncio. Volevo chiederle se l'appartamento è disponibile per la seconda settimana di agosto. grazie mille",
                 'email_sender' => 'luisa@gmail.com',
                'accomodation_id' => '1',
            ],
            [
                'object_email' => "Intero alloggio (casa)",
                'content' => "Salve, è disponibile ad abbassare il prezzo dell'appartmento?",
                 'email_sender' => 'giuseppe@gmail.com',
                'accomodation_id' => '3',
            ],
            [
                'object_email' => "Domus Chiavari House",
                'content' => "Buongiorno, l'appaartamento è disponibile dal 22/08 al 07/08?",
                 'email_sender' => 'maria@gmail.com',
                'accomodation_id' => '3',
            ],
            [
                'object_email' => "Intero alloggio (loft)",
                'content' => "Salve, la contattarla in merito al suo annuncio. Volevo chiederle se l'appartamento è disponibile per la seconda settimana di agosto. grazie mille",
                 'email_sender' => "luca@gmail.com",
                'accomodation_id' => '4',
            ],
            [
                'object_email' => "Graziosa mansarda con vista sul Pantheon",
                'content' => "Salve, è disponibile ad abbassare il prezzo dell'appartmento?",
                 'email_sender' => 'federica@gmail.com',
                'accomodation_id' => '5',
            ],
            [
                'object_email' => "Colosseo's door",
                'content' => "Salve, la contattarla in merito al suo annuncio. Volevo chiederle se l'appartamento è disponibile per la seconda settimana di agosto. grazie mille",
                 'email_sender' => 'roberto@gmail.com',
                'accomodation_id' => '6',
            ],
            [
                'object_email' => '"Loft Garden San Lorenzo"',
                'content' => "Buongiorno, l'appaartamento è disponibile dal 22/08 al 07/08?",
                 'email_sender' => 'alessia@gmail.com',
                'accomodation_id' => '7',
            ],
            [
                'object_email' => 'Artists House - CENTRUM - Campo de fiori',
                'content' => "Salve, la contattarla in merito al suo annuncio. Volevo chiederle se l'appartamento è disponibile per la seconda settimana di agosto. grazie mille",
                 'email_sender' => 'federico@gmail.com',
                'accomodation_id' => '2',
            ],
            [
                'object_email' => "Intero alloggio (casa)",
                'content' => "Salve, la contattarla in merito al suo annuncio. Volevo chiederle se l'appartamento è disponibile per la seconda settimana di agosto. grazie mille",
                 'email_sender' => 'piero@gmail.com',
                'accomodation_id' => '1',
            ],
            [
                'object_email' => "Intero alloggio (casa)",
                'content' => "Salve, è disponibile ad abbassare il prezzo dell'appartmento?",
                 'email_sender' => 'giorgia@gmail.com',
                'accomodation_id' => '3',
            ],
            [
                'object_email' => "Domus Chiavari House",
                'content' => "Buongiorno, l'appaartamento è disponibile dal 22/08 al 07/08?",
                 'email_sender' => 'aldo@gmail.com',
                'accomodation_id' => '3',
            ],
            [
                'object_email' => "Intero alloggio (loft)",
                'content' => "Salve, la contattarla in merito al suo annuncio. Volevo chiederle se l'appartamento è disponibile per la seconda settimana di agosto. grazie mille",
                 'email_sender' => "valeria@gmail.com",
                'accomodation_id' => '4',
            ],
            [
                'object_email' => "Graziosa mansarda con vista sul Pantheon",
                'content' => "Salve, è disponibile ad abbassare il prezzo dell'appartmento?",
                 'email_sender' => 'alessandro@gmail.com',
                'accomodation_id' => '5',
            ],
            [
                'object_email' => "Colosseo's door",
                'content' => "Salve, la contattarla in merito al suo annuncio. Volevo chiederle se l'appartamento è disponibile per la seconda settimana di agosto. grazie mille",
                 'email_sender' => 'luca@gmail.com',
                'accomodation_id' => '6',
            ],
            [
                'object_email' => '"Loft Garden San Lorenzo"',
                'content' => "Buongiorno, l'appaartamento è disponibile dal 22/08 al 07/08?",
                 'email_sender' => 'giuliana@gmail.com',
                'accomodation_id' => '7',
            ],
        ];

        foreach ($messages as $message) {
            $new_message = new Message();

            $new_message->fill($message);

            $new_message->save();
        }

    }
}
