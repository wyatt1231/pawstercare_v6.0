<?php 
    class Firebase extends CI_Model{

        public function send($registration_ids, $notification,$data) {
           
           define( 'API_ACCESS_KEY', 'AAAACpYCU54:APA91bHLhf06313UNfT82B4DYXwgEw4jJ6u4hWhQlGOI6K5XerepOKNWvQrZSDoXA6zPZqoSK1-P2MX4MvOX5qvOXqdVnw0B3-bkkrQPaWvmwqhT1qL53-76-zrt0D6yxVIimF98pf1B');
                $fields = array  (
                          'registration_ids' => $registration_ids,
                          'notification' => $notification,
                          'data'        => $data
                        );
                $headers = array
                        (
                            'Authorization: key=' . API_ACCESS_KEY,
                            'Content-Type: application/json'
                        );
                    $ch = curl_init();
                    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
                    curl_setopt( $ch,CURLOPT_POST, true );
                    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
                    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
                    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
                    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
                    $result = curl_exec($ch );
                    curl_close( $ch );
        }
        
      
    }
?>