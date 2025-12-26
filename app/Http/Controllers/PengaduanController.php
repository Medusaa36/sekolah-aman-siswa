<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('LandingPage.form_pengaduan');
    }
    public function sekolah()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api-hacktown.rusnandapurnama.com/sekolahs");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $result = curl_exec($ch);
        curl_close($ch);

        return response()->json(json_decode($result, true));
    }

    public function kategori()
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api-hacktown.rusnandapurnama.com/kategori-bullying");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $result = curl_exec($ch);
        curl_close($ch);

        return response()->json(json_decode($result, true));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('LandingPage.form_pengaduan');
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap'       => 'required|string',
            'kelas'              => 'required|string',
            'sekolah'            => 'required',
            'kategori'           => 'required',
            'deskripsi_kejadian' => 'required|string',
            'lokasi'             => 'required|string',
            'email'              => 'required|email',
            'whatsapp'           => 'required|string',
            'bukti'              => 'nullable|mimes:jpg,jpeg,png|max:10024',
        ]);

        $attachments = [];

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');

            try {
                $uploadResponse = Http::withoutVerifying()
                    ->attach(
                        'img', 
                        fopen($file->getRealPath(), 'r'),
                        $file->getClientOriginalName()
                    )
                    ->post('https://api-hacktown.rusnandapurnama.com/img');

                if ($uploadResponse->failed()) {
                    Log::error('UPLOAD IMAGE FAILED', [
                        'status' => $uploadResponse->status(),
                        'body'   => $uploadResponse->body(),
                    ]);

                    return back()->withErrors([
                        'bukti' => 'Gagal upload gambar'
                    ])->withInput();
                }

                $uploadData = $uploadResponse->json();

                $path =
                    $uploadData['path']
                    ?? $uploadData['data']['path']
                    ?? $uploadData['data']
                    ?? null;

                if ($path) {
                    $attachments[] = $path;
                }

            } catch (\Throwable $e) {
                Log::error('UPLOAD IMAGE EXCEPTION', [
                    'message' => $e->getMessage()
                ]);

                return back()->withErrors([
                    'bukti' => 'Terjadi kesalahan saat upload gambar'
                ])->withInput();
            }
        }

        $payload = [
            'nama_lengkap'       => $validated['nama_lengkap'],
            'kelas'              => $validated['kelas'],
            'sekolah_id'         => $validated['sekolah'],
            'kategori_id'        => $validated['kategori'],
            'deskripsi_kejadian' => $validated['deskripsi_kejadian'],
            'lokasi'             => $validated['lokasi'],
            'email'              => $validated['email'],
            'whatsapp'           => $validated['whatsapp'],
        ];

        if (!empty($attachments)) {
            $payload['attachments'] = $attachments;
        }

        $response = Http::withoutVerifying()
            ->post('https://api-hacktown.rusnandapurnama.com/laporan', $payload);

        if ($response->failed()) {
            Log::error('API LAPORAN ERROR', [
                'status' => $response->status(),
                'body'   => $response->body(),
                'payload'=> $payload,
            ]);

            return back()->withErrors([
                'api' => 'Gagal mengirim laporan'
            ])->withInput();
        }

        $responseData = $response->json();

        $ticketId =
            $responseData['data']['ticket_id']
            ?? $responseData['data']['laporan']['ticket_id']
            ?? null;

        return redirect()->route('LandingPage.cek_status', [
            'ticket_id' => $ticketId
        ])->with([
            'success' => true,
            'ticket_id' => $ticketId,
            'email' => $validated['email']
        ]);

    }
    public function cek_status(Request $request)
    {
        $ticketId = strtoupper(trim($request->query('ticket_id')));
        $laporan  = null;
        $error    = null;

        if (empty($ticketId)) {
            return view('LandingPage.cek_status', compact('ticketId', 'laporan', 'error'));
        }

        try {
            $response = Http::timeout(15)
                ->withoutVerifying()
                ->get("https://api-hacktown.rusnandapurnama.com/laporan/ticket/{$ticketId}");

            if ($response->status() === 404) {
                $error = "Tiket <strong>{$ticketId}</strong> tidak ditemukan.";
            } elseif (!$response->successful()) {
                throw new \Exception('API tidak merespon dengan benar');
            } else {
                $json = $response->json();

                if (!isset($json['data'])) {
                    throw new \Exception('Format response API tidak sesuai');
                }

                $laporan = $json['data'];
            }

        } catch (\Throwable $e) {
            Log::error('CEK STATUS ERROR', [
                'ticket_id' => $ticketId,
                'message'   => $e->getMessage(),
            ]);

            $error = 'Terjadi kesalahan saat mengambil data laporan.';
        }

        return view('LandingPage.cek_status', compact(
            'ticketId',
            'laporan',
            'error'
        ));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
