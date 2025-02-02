

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `tersedia` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `jenis_pesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `jenis_pesanan1` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_katagory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `kelebihan_pelayanan` (
  `id` int(11) NOT NULL,
  `nama_pelayanan` varchar(100) DEFAULT NULL,
  `penjelasaan` text DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `jenis_pesanan` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('belum dibaca','sudah dibaca') DEFAULT 'belum dibaca',
  `status_booking` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `pemesanan1` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama_usaha` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `penjelasan` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `id_pengirim` int(11) DEFAULT NULL,
  `id_penerima` int(11) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `jam` datetime DEFAULT NULL,
  `status` enum('sudah baca','belum baca') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `kategory_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `penjelasan` text NOT NULL,
  `foto_1` varchar(100) DEFAULT NULL,
  `foto_2` varchar(100) DEFAULT NULL,
  `foto_3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `sosmed` (
  `id` int(11) NOT NULL,
  `ig` varchar(100) DEFAULT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `tiktok` varchar(100) DEFAULT NULL,
  `hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


