<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class AlegraService
{

    private $baseUri = 'https://api.alegra.com/api/v1/';

    /**
     * Crea un item
     *
     */
    public function createItem($name, $price)
    {
        $result = (Object) [
            'success' => false,
            'data' => null,
        ];

        try {

            $client = new Client([
                'base_uri' => $this->baseUri,
            ]);

            $headers = [
                'Authorization' => 'Basic ' . $this->generateAuth(),
            ];

            $body = (Object) [
                'name' => $name,
                'price' => $price ?? 0,
            ];

            $request = $client->request('POST', 'items', [
                'headers' => $headers,
                'http_errors' => false,
                'body' => json_encode($body),
            ]
            );

            $response = json_decode($request->getBody()->getContents());

            // Validación de respuesta
            if ($request->getStatusCode() >= 400) {

                throw new \Exception('Error en la creación del item en el ERP / ' . $request->getBody());

            }

            $result->success = true;
            $result->data = $response;

            return $result;

        } catch (\Exception $ex) {

            Log::error($ex->getMessage());

            return $result;

        }

    }

    /**
     * Crea un Contacto
     *
     */
    public function createContact($name, $email, $mobile, $document_id)
    {
        $result = (Object) [
            'success' => false,
            'data' => null,
        ];

        try {

            $client = new Client([
                'base_uri' => $this->baseUri,
            ]);

            $headers = [
                'Authorization' => 'Basic ' . $this->generateAuth(),
            ];

            $body = (Object) [
                'name' => $name,
                'type' => 'client',
                'email' => $email,
                'mobile' => $mobile,
                'identification' => $document_id,
            ];

            $request = $client->request('POST', 'contacts', [
                'headers' => $headers,
                'http_errors' => false,
                'body' => json_encode($body),
            ]
            );

            $response = json_decode($request->getBody()->getContents());

            // Validación de respuesta
            if ($request->getStatusCode() >= 400) {

                throw new \Exception('Error en la creación del contacto en el ERP / ' . $request->getBody());

            }

            $result->success = true;
            $result->data = $response;

            return $result;

        } catch (\Exception $ex) {

            Log::error($ex->getMessage());

            return $result;

        }

    }

    /**
     * Crea una Factura
     *
     */
    public function createInvoice($clientId, $items, $anotation, $total)
    {
        $result = (Object) [
            'success' => false,
            'data' => null,
        ];

        try {

            $client = new Client([
                'base_uri' => $this->baseUri,
            ]);

            $headers = [
                'Authorization' => 'Basic ' . $this->generateAuth(),
            ];

            $payment = [
                (Object) [
                    'date' => date('Y-m-d'),
                    'account' => (Object) [
                        'id' => config('alegra.bank_account'),
                    ],
                    'amount' => $total,
                ],
            ];

            $body = (Object) [
                'date' => date('Y-m-d'),
                'dueDate' => date('Y-m-d'),
                'client' => $clientId,
                'items' => $items,
                'payments' => $payment,
                'anotation' => $anotation,
                'paymentForm' => 'CASH',
                'paymentMethod' => 'MUTUAL_AGREEMENT',
            ];

            $request = $client->request('POST', 'invoices', [
                'headers' => $headers,
                'http_errors' => false,
                'body' => json_encode($body),
            ]
            );

            $response = json_decode($request->getBody()->getContents());

            // Validación de respuesta
            if ($request->getStatusCode() >= 400) {

                throw new \Exception('Error en la creación del contacto en el ERP / ' . $request->getBody());

            }

            $result->success = true;
            $result->data = $response;

            return $result;

        } catch (\Exception $ex) {

            Log::error($ex->getMessage());

            return $result;

        }

    }

    /**
     * Genera el estring de autenticación
     */
    private function generateAuth()
    {
        return base64_encode(config('alegra.user') . ':' . config('alegra.password'));
    }

}
