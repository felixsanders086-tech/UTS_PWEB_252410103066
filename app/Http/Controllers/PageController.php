<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PageController extends Controller
{
    public function login(): View
    {
        return view('login');
    }

    public function prosesLogin(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'username' => ['required', 'string', 'min:3', 'max:30'],
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.min' => 'Username minimal 3 karakter.',
            'username.max' => 'Username maksimal 30 karakter.',
        ]);

        return redirect()->route('dashboard', ['username' => $data['username']]);
    }

    public function dashboard(Request $request): View|RedirectResponse
    {
        $username = $request->query('username');
        if (!$username) {
            return redirect()->route('login');
        }

        $wisata = $this->dataWisata();
        $rekomendasi = array_slice($wisata, 0, 3);

        return view('dashboard', compact('username', 'rekomendasi'));
    }

    public function pengelolaan(Request $request): View|RedirectResponse
    {
        $username = $request->query('username');
        if (!$username) {
            return redirect()->route('login');
        }

        $kataKunci = trim($request->query('q', ''));
        $semuaWisata = $this->dataWisata();

        if ($kataKunci !== '') {
            $wisata = array_filter($semuaWisata, function ($item) use ($kataKunci) {
                return str_contains(strtolower($item['nama']), strtolower($kataKunci));
            });
        } else {
            $wisata = $semuaWisata;
        }

        return view('pengelolaan', compact('username', 'wisata', 'kataKunci'));
    }

    public function profile(Request $request): View|RedirectResponse
    {
        $username = $request->query('username');
        if (!$username) {
            return redirect()->route('login');
        }

        return view('profile', compact('username'));
    }

    private function dataWisata(): array
    {
        return [
            [
                'nama' => 'Pantai Papuma',
                'kategori' => 'Pantai',
                'lokasi' => 'Kecamatan Wuluhan, Jember',
                'deskripsi' => 'Pantai dengan pasir putih, batu karang ikonik, dan panorama laut yang memanjakan mata.',
                'fakta' => 'Nama Papuma dikenal sebagai singkatan dari Pasir Putih Malikan.',
                'gambar' => 'https://imgs.search.brave.com/NRe2rbn8m9tfSW63M82ZVkvDZ12T8U12lg1xhBVzw_4/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9jZG4u/dGltZXNtZWRpYS5j/by5pZC9pbWFnZXMv/MjAyMi8wMi8wOC9Q/YW50YWktUGFwdW1h/LmpwZw',
                'maps' => 'https://maps.app.goo.gl/6ABK7YcRyMipTPQz9',
            ],
            [
                'nama' => 'Pantai Watu Ulo',
                'kategori' => 'Pantai',
                'lokasi' => 'Kecamatan Ambulu, Jember',
                'deskripsi' => 'Destinasi pesisir yang dikenal dengan deretan batu panjang menyerupai bentuk ular.',
                'fakta' => 'Watu Ulo berarti batu ular dalam bahasa Jawa.',
                'gambar' => 'https://imgs.search.brave.com/3iJ-ZoOm8QGqWIZu5FlxH6GF9i1XChHpC5cSkmySqqE/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9ibHVl/Lmt1bXBhcmFuLmNv/bS9pbWFnZS91cGxv/YWQvZmxfcHJvZ3Jl/c3NpdmUsZmxfbG9z/c3ksY19maWxsLGZf/YXV0byxxX2F1dG86/YmVzdCx3XzY0MC92/MTYzNDAyNTQzOS8w/MWpkeDByeTYyZjhn/MHE4MDhjYWYwOWVw/dy5qcGc',
                'maps' => 'https://maps.app.goo.gl/83sX7owDmHqb1Y6AA',
            ],
            [
                'nama' => 'Pantai Payangan',
                'kategori' => 'Pantai',
                'lokasi' => 'Kecamatan Ambulu, Jember',
                'deskripsi' => 'Kawasan pantai dengan teluk, perbukitan hijau, dan pemandangan laut dari beberapa sudut.',
                'fakta' => 'Area perbukitan di sekitarnya menjadi tempat untuk menikmati panorama teluk dari ketinggian.',
                'gambar' => 'https://imgs.search.brave.com/sV0CkJiHDOZ_PYIFXjF0TmUzFLUr5_ECz37R3UNHdWg/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9qZWph/a3Bpa25pay5jb20v/d3AtY29udGVudC91/cGxvYWRzLzIwMTcv/MDYvQGFmZnJpaWdf/LmpwZw',
                'maps' => 'https://maps.app.goo.gl/DPPcDNFLdmKnTPNq7',
            ],
            [
                'nama' => 'Teluk Love',
                'kategori' => 'Alam',
                'lokasi' => 'Kecamatan Ambulu, Jember',
                'deskripsi' => 'Teluk dengan garis pantai yang tampak menyerupai bentuk hati ketika dilihat dari atas bukit.',
                'fakta' => 'Pemandangan bentuk hati paling mudah dikenali dari area pandang di perbukitan sekitar.',
                'gambar' => 'https://imgs.search.brave.com/IZ6SRa07tdtcSsOOsVDqY75N78vaMBEqvXyGjOHczK8/rs:fit:500:0:1:0/g:ce/aHR0cDovL2JhY2tw/YWNrZXJqYWthcnRh/LmNvbS93cC1jb250/ZW50L3VwbG9hZHMv/MjAxNi8xMS90ZWx1/azJCbG92ZTJCcGF5/YW5nYW4yQmplbWJl/ci5qcGc',
                'maps' => 'https://maps.app.goo.gl/st1zhpAHVi8UKUSq5',
            ],
            [
                'nama' => 'Air Terjun Tancak',
                'kategori' => 'Air Terjun',
                'lokasi' => 'Desa Suci, Kecamatan Panti, Jember',
                'deskripsi' => 'Air terjun di kawasan perbukitan dengan suasana alam yang sejuk dan pepohonan hijau.',
                'fakta' => 'Air Terjun Tancak berada di kawasan lereng Gunung Pasang.',
                'gambar' => 'https://imgs.search.brave.com/kANqM7XdQSmQTOiN82e7IHEbQodNpUL3nJ6J7HhMRbo/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9hc3Nl/dC5rb21wYXMuY29t/L2Nyb3BzL3U2bEhi/YnBHdW5WZWd1YlVC/Qm5iS09yaWNqND0v/MHgwOjEwMDB4NjY3/LzEyMDB4ODAwL2Rh/dGEvcGhvdG8vMjAy/My8wNy8xMC82NGFj/MDBjZWMwNDdhLmpw/Zw',
                'maps' => 'https://maps.app.goo.gl/XSSJWg8nTf61bzfq7',
            ],
            [
                'nama' => 'Puncak Rembangan',
                'kategori' => 'Pegunungan',
                'lokasi' => 'Kecamatan Arjasa, Jember',
                'deskripsi' => 'Kawasan dataran tinggi dengan udara sejuk dan pemandangan alam di sekitar Jember.',
                'fakta' => 'Rembangan dikenal sebagai salah satu kawasan wisata pegunungan di Jember.',
                'gambar' => 'https://imgs.search.brave.com/PJXZBPBqdi4h3IZtR7PyyqqYGaTrpBhKJybcn8auva4/rs:fit:0:180:1:0/g:ce/aHR0cHM6Ly9hc3Nl/dHMua29tcGFzaWFu/YS5jb20vaXRlbXMv/YWxidW0vMjAyNS8w/NS8yMi91bm5hbWVk/LTEtMTF6b24tMDg3/Zjc4YjExZC02ODJm/MDk3ZWVkNjQxNTAz/NjE3MWM0YzQuanBl/Zz90PW8mdj0yNjA',
                'maps' => 'https://maps.app.goo.gl/iYD2Fq8gLMfwurRY8',
            ],
            [
                'nama' => 'Taman Botani Sukorambi',
                'kategori' => 'Taman',
                'lokasi' => 'Kecamatan Sukorambi, Jember',
                'deskripsi' => 'Tempat rekreasi bernuansa alam yang memiliki koleksi tanaman dan area kegiatan keluarga.',
                'fakta' => 'Tempat ini memadukan wisata rekreasi dengan pengenalan berbagai jenis tanaman.',
                'gambar' => 'https://imgs.search.brave.com/vHUjKonE7U8SnyvPInHjPnGHotag7ymaoBSkuv9V8to/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9oYXJn/YWNhbXB1ci5jb20v/d3AtY29udGVudC91/cGxvYWRzLzIwMjQv/MDEvSGFyZ2EtVGlr/ZXQtTWFzdWstVGFt/YW4tQm90YW5pLVN1/a29yYW1iaS53ZWJw',
                'maps' => 'https://maps.app.goo.gl/VxqBf8MajEWZxV4Q8',
            ],
            [
                'nama' => 'Pantai Bandealit',
                'kategori' => 'Pantai',
                'lokasi' => 'Kawasan Taman Nasional Meru Betiri, Jember',
                'deskripsi' => 'Pantai alami dengan suasana tenang yang berada di kawasan Taman Nasional Meru Betiri.',
                'fakta' => 'Kawasan ini termasuk wilayah konservasi Taman Nasional Meru Betiri.',
                'gambar' => 'https://imgs.search.brave.com/NqhVM8iwE2iAGmsNG00gpJ03IG5a93pcC1CaabvF9MU/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9tZWRp/YS5zdWFyYS5jb20v/cGljdHVyZXMvNjUz/eDM2Ni8yMDI1LzA1/LzE3LzU3MzQ0LXBh/bnRhaS1iYW5kZWFs/aXQtaW5zdGFncmFt/Y29tYXRwYW50YWkt/YmFuZGVhbGl0Lmpw/Zw',
                'maps' => 'https://maps.app.goo.gl/SFD3goEcduzbprfx8',
            ],
        ];
    }
}
