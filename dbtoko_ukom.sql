-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2014 at 10:31 
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbtoko_ukom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbarang`
--

CREATE TABLE IF NOT EXISTS `tblbarang` (
  `idbarang` int(11) NOT NULL AUTO_INCREMENT,
  `idvendor` int(11) NOT NULL,
  `namabarang` text NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga` float NOT NULL,
  `stok` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  PRIMARY KEY (`idbarang`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `tblbarang`
--

INSERT INTO `tblbarang` (`idbarang`, `idvendor`, `namabarang`, `deskripsi`, `gambar`, `harga`, `stok`, `diskon`) VALUES
(64, 1, 'Antifake', 'Kain lembut impor', 'antifake.png', 65000, 19, 2),
(65, 1, 'Barong PSD', 'Nyaman dipakai', 'barong.png', 50000, 10, 1),
(66, 1, 'Fas PSD', 'Tidak mudah molor', 'fas.png', 55000, 16, 2),
(67, 1, 'Fifth PSD', 'Kain combed 30s', 'fifth-psd.png', 60000, 12, 2),
(68, 1, 'Globe PSD', 'Kain lembut size L', 'globe.png', 60000, 16, 0),
(69, 1, 'Howling', 'Nyaman dipakai', 'howling.png', 55000, 9, 1),
(70, 1, 'Mastrade', 'Kain halus combed 30s', 'mastrade.png', 65000, 4, 1),
(71, 1, 'Melting', 'Kualitas impor', 'melting.png', 70000, 2, 0),
(72, 1, 'Aviation', 'Awet, tidak mudah luntur', 'aviation.png', 112000, 7, 1),
(73, 1, '', '', '', 0, 0, 0),
(63, 1, 'Altar', 'Kain combed 30s size L', 'altar.png', 60000, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblberita`
--

CREATE TABLE IF NOT EXISTS `tblberita` (
  `idberita` int(11) NOT NULL AUTO_INCREMENT,
  `judul` text NOT NULL,
  `tanggal` date NOT NULL,
  `berita` text NOT NULL,
  `gambar` text NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`idberita`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tblberita`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbljenis`
--

CREATE TABLE IF NOT EXISTS `tbljenis` (
  `idjenis` int(11) NOT NULL AUTO_INCREMENT,
  `idkategori` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  PRIMARY KEY (`idjenis`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tbljenis`
--

INSERT INTO `tbljenis` (`idjenis`, `idkategori`, `jenis`) VALUES
(1, 1, 'Man'),
(2, 2, 'Woman'),
(3, 3, 'Junior'),
(6, 3, 'Pria'),
(7, 1, 'Kid'),
(9, 6, 'Celana 3/4'),
(8, 5, 'lelaki'),
(10, 6, 'tes2');

-- --------------------------------------------------------

--
-- Table structure for table `tblkategori`
--

CREATE TABLE IF NOT EXISTS `tblkategori` (
  `idkategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`idkategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tblkategori`
--

INSERT INTO `tblkategori` (`idkategori`, `kategori`) VALUES
(1, 'Baju'),
(2, 'Celana'),
(3, 'Jaket'),
(4, 'Sepatu'),
(5, 'Topi'),
(19, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tblkomen`
--

CREATE TABLE IF NOT EXISTS `tblkomen` (
  `idkomentar` int(11) NOT NULL AUTO_INCREMENT,
  `idberita` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `isikomentar` text NOT NULL,
  PRIMARY KEY (`idkomentar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tblkomen`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE IF NOT EXISTS `tblorder` (
  `idorder` int(11) NOT NULL AUTO_INCREMENT,
  `idbarang` int(11) NOT NULL,
  `nomororder` text NOT NULL,
  `jumlahorder` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `hargabarang` float NOT NULL,
  `iduser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`idorder`, `idbarang`, `nomororder`, `jumlahorder`, `tanggal`, `hargabarang`, `iduser`, `status`) VALUES
(1, 1, '1', 15, '2013-11-28', 90, 3, 1),
(2, 2, '2', 50, '2013-11-29', 30, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblrating`
--

CREATE TABLE IF NOT EXISTS `tblrating` (
  `idrating` int(11) NOT NULL AUTO_INCREMENT,
  `idbarang` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`idrating`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tblrating`
--


-- --------------------------------------------------------

--
-- Table structure for table `tblslide`
--

CREATE TABLE IF NOT EXISTS `tblslide` (
  `idslide` int(11) NOT NULL AUTO_INCREMENT,
  `slide` text NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`idslide`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tblslide`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbltoko`
--

CREATE TABLE IF NOT EXISTS `tbltoko` (
  `idtoko` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notelp` text NOT NULL,
  `norek` text NOT NULL,
  `logo` varchar(100) NOT NULL,
  `slogan` text NOT NULL,
  PRIMARY KEY (`idtoko`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbltoko`
--

INSERT INTO `tbltoko` (`idtoko`, `nama`, `alamat`, `notelp`, `norek`, `logo`, `slogan`) VALUES
(1, 'Faith Distro', 'Jl Surowongso 518 Gedangan Sidoarjo', '(031)12349877', '012354678', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE IF NOT EXISTS `tbluser` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(100) NOT NULL,
  `nama` text NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `notelp` text NOT NULL,
  `user` text NOT NULL,
  `password` text NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`iduser`, `gambar`, `nama`, `alamat`, `notelp`, `user`, `password`, `level`, `status`) VALUES
(1, '', 'Fahmy', 'Sidoarjo', '123', 'Fahmy', 'Fahmy', 1, 1),
(2, '', 'Yacub', 'Sidoarjo', '456', 'Yacub', 'Yacub', 1, 1),
(3, '', 'Komeng', 'Sedati', '789', 'Komeng', 'Komeng', 1, 1),
(4, '', 'Ardiansyah', 'Sidoarjo', '987', 'Ardiansyah', 'Ardiansyah', 1, 1),
(5, 'badnote.png', 'Doyok', 'Sidoarjo', '09986444', 'dyk', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblvendor`
--

CREATE TABLE IF NOT EXISTS `tblvendor` (
  `idvendor` int(11) NOT NULL AUTO_INCREMENT,
  `idjenis` int(11) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  PRIMARY KEY (`idvendor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tblvendor`
--

INSERT INTO `tblvendor` (`idvendor`, `idjenis`, `vendor`) VALUES
(1, 1, 'Petersays Denim'),
(2, 1, 'Dickies'),
(3, 2, 'Kick Denim'),
(4, 2, 'DC'),
(14, 3, 'Fraud');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
