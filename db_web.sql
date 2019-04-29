-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2019 at 08:53 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul_artikel` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(100) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `id_login` int(11) NOT NULL,
  `konfirmasi` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `deskripsi`, `gambar`, `tanggal`, `id_login`, `konfirmasi`) VALUES
(4, 'a33', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Digital NexIcorn.jpeg', '2019-03-28', 5, 1),
(5, 'ada', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Pemerintah Bangun Jembatan Gantung.jpeg', '2017-11-29', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `judul_kontak` varchar(50) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id_konten` int(11) NOT NULL,
  `judul_konten` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `tanggal` date NOT NULL,
  `id_login` int(11) NOT NULL,
  `konfirmasi` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(64) NOT NULL,
  `izin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `nama`, `username`, `password`, `izin`) VALUES
(5, 'Risto', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(6, 'Sekdes', 'root', '63a9f0ea7bb98050796b649e85481845', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `menu_utama` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nama`
--

CREATE TABLE `nama` (
  `id_nama` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `judul_pelayanan` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(50) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `bukti` varchar(50) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `judul_pengumuman` varchar(50) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `tanggal` date NOT NULL,
  `konfirmasi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_login`, `judul_pengumuman`, `gambar`, `deskripsi`, `tanggal`, `konfirmasi`) VALUES
(3, 5, 'Cobaa', 'clientserverdiagm.png', '<p>saya</p>', '2019-03-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `judul_profil` varchar(50) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `id_login`, `judul_profil`, `gambar`, `deskripsi`, `tanggal`) VALUES
(3, 5, 'PROFIL UMUM KELURAHAN SETU', 'logo-tangsel.png', '<p></p><p>DASAR HUKUM PEBENTUKAN KECAMATAN SETU DAN KELURAHAN DI\r\nKECAMATAN SETU</p>\r\n\r\n<p>Peraturan Daerah Kota Tangerang\r\nSelatan  Nomor 10 Tahun 2012 Tentang\r\nPerubahan Status 5 Desa menjadi Kelurahan di Kecamatan Setu Lembaran Daerah\r\nKota Tangerang Selatan tahun 2012 Nomor 10, Tambahan Lembaran Daerah Kota\r\nTangerang Selatan Nomor 2012.</p>\r\n\r\n<p>Perda Pembentukan Dan Susunan Perangkat Daerah Tangerang\r\nSelatan Nomor 8 Tahun 2016 dan Perwal Kedudukan, Susunan, Organisasi, Tupoksi\r\nKecamatan Setu Nomor 113 Tahun 2016</p>\r\n\r\n<p>Mengenal kelurahan SETU : </p>\r\n\r\n<p>Terdiri dari 6 RW Dan 27 RT</p>\r\n\r\n<p>4 (Empat) RW di wilayah Perkampungan</p>\r\n\r\n<p>2 (Empat ) RW di Wilayah Perumahan  yaitu Perumahan Dinas PUSPIPTEK dan PURI\r\nSERPONG I</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><b>LEMBAGA YANG ADA\r\nDI KELURAHAN</b></p>\r\n\r\n<p>Lembaga Pemberdayaan masyarakat Kelurahan (LPMK)</p>\r\n\r\n<p>Pendidikan Kesejahteraan Keluarga (PKK)</p>\r\n\r\n<p>KARANG TARUNA</p>\r\n\r\n<p>Badan keswadayaan masyarakat (BKM)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><b>DATA STASTISTIK\r\nKELURAHAN SETU</b></p>\r\n\r\n<p>Luas Wilayah 364 ha/205 km</p>\r\n\r\n<p>Jumlah Penduduk</p>\r\n\r\n<p>Jumlah Kepala Keluarga &nbsp;4028 KK</p>\r\n\r\n<p>Jumlah penduduk &nbsp; 12.851</p>\r\n\r\n<p>Laki-Laki =  6.496\r\njiwa</p>\r\n\r\n<p>Perempuan =  6.355 jiwa</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>BATAS-BATAS WILAYAH</p>\r\n\r\n<p>UTARA = KELURAHAN SERPONG \r\n(KECAMATAN SERPONG)</p>\r\n\r\n<p>TIMUR = KELURAHAN BABAKAN (KEC SETU) DAN KELURAHAN BUARAN\r\n(KEC SERPONG)</p>\r\n\r\n<p>SELATAN = DESA PENGASINAN KAB.BOGOR JAWA BARAT</p>\r\n\r\n<p>BARAT = KELURAHAN MUNCUL DAN KADEMANGAN (KECAMATAN SETU)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><b><u>TUGAS POKOK DAN\r\nFUNGSI LURAH DAN SEKRETARIS KELURAHAN</u></b></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>1. Lurah</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lurah mempunyai tugas pokok membantu Camat dalam\r\nMelaksanakan kegiatan pemerintahan kelurahan</p>\r\n\r\n<p>Melakukan pemberdayaan masyarakat</p>\r\n\r\n<p>Melaksanakan pelayanan masyarakat</p>\r\n\r\n<p>Memelihara Ketentraman dan Ketertiban umum; dan</p>\r\n\r\n<p>Memelihara sarana dan prasarana serta fasilitas pelayanan\r\numum</p>\r\n\r\n<p>Dalam melaksanakan tugas sebagaimana dimaksud pada ayat\r\n(1), Lurah mempunyai fungsi :</p>\r\n\r\n<p>Penyusunan program dan kegiatan kelurahan </p>\r\n\r\n<p>Pengoordinasian penyelenggaraan pemerintahan di wilayah\r\nkelurahan</p>\r\n\r\n<p>Penyelenggaraan kegiatan pembinaan ideologi negara dan\r\nkesatuan bangsa lingkup rukun warga</p>\r\n\r\n<p>Pengoordinasian kegiatan pembangunan dan pemberdayaan\r\nmasyarakat</p>\r\n\r\n<p>Pembinaan penyelenggaraan terhadap  kegiatan di bidang POSYANDU dan kebersihan</p>\r\n\r\n<p>&nbsp;2. Sekretariat\r\nKelurahan</p>\r\n\r\n<p>Sekretariat Kelurahan dipimpin oleh seorang Sekretaris\r\nkelurahan yang berada di bawah dan bertanggung jawab kepada Lurah:</p>\r\n\r\n<p>Sekretaris Kelurahan yang \r\nmempunyai tugas pokok membantu Lurah dalam menyiapkan bahan rapat,\r\nadministrasi kerumahtanggaan, keuangan, kepegawaian, kehumasan organisasi dan\r\ntatalaksana serta melaksanakan pelayanan teknis administrastif kepada unsur\r\nsatuan organisasi Pemerintahan Kelurahan</p>\r\n\r\n<p>Dalam melaksanakan tugas sebagaimana dimaksud pada ayat\r\n(2). </p>\r\n\r\n<p>Sekretaris Kelurahan mempunyai fungsi :</p>\r\n\r\n<p>Pelaksanaan penyusunan rencana dan program kegiatan\r\nlayanan pemerintahan, pembangunan dan kemasyrakatan pemerintah kelurahan</p>\r\n\r\n\r\n\r\n\r\n\r\n<br><p></p>', '2019-03-29');

-- --------------------------------------------------------

--
-- Table structure for table `publikasi`
--

CREATE TABLE `publikasi` (
  `id_publikasi` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `judul_publikasi` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(50) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sambutan`
--

CREATE TABLE `sambutan` (
  `id_sambutan` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `judul_sambutan` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `tanggal` date NOT NULL,
  `gambar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sturuktur`
--

CREATE TABLE `sturuktur` (
  `id_struktur` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `judul_struktur` varchar(50) DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `submenu` varchar(50) NOT NULL,
  `submenu_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `syarat`
--

CREATE TABLE `syarat` (
  `id_syarat` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `judul_syarat` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `gambar` varchar(50) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visimisi`
--

CREATE TABLE `visimisi` (
  `id_visimisi` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `judul_visimisi` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `nama`
--
ALTER TABLE `nama`
  ADD PRIMARY KEY (`id_nama`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`id_publikasi`);

--
-- Indexes for table `sambutan`
--
ALTER TABLE `sambutan`
  ADD PRIMARY KEY (`id_sambutan`);

--
-- Indexes for table `sturuktur`
--
ALTER TABLE `sturuktur`
  ADD PRIMARY KEY (`id_struktur`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indexes for table `syarat`
--
ALTER TABLE `syarat`
  ADD PRIMARY KEY (`id_syarat`);

--
-- Indexes for table `visimisi`
--
ALTER TABLE `visimisi`
  ADD PRIMARY KEY (`id_visimisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nama`
--
ALTER TABLE `nama`
  MODIFY `id_nama` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `id_publikasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sambutan`
--
ALTER TABLE `sambutan`
  MODIFY `id_sambutan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sturuktur`
--
ALTER TABLE `sturuktur`
  MODIFY `id_struktur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `syarat`
--
ALTER TABLE `syarat`
  MODIFY `id_syarat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visimisi`
--
ALTER TABLE `visimisi`
  MODIFY `id_visimisi` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
