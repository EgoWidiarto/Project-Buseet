/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 100425 (10.4.25-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : buseet_database

 Target Server Type    : MySQL
 Target Server Version : 100425 (10.4.25-MariaDB)
 File Encoding         : 65001

 Date: 03/06/2024 13:37:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id_admin` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_admin` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------

-- ----------------------------
-- Table structure for bus
-- ----------------------------
DROP TABLE IF EXISTS `bus`;
CREATE TABLE `bus`  (
  `Id_bus` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kapasitas` int NOT NULL,
  `nama_bus` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipe_bus` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id_bus`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of bus
-- ----------------------------
INSERT INTO `bus` VALUES ('A07', 45, 'Budiman', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A08', 35, 'Rosalia Indah', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A09', 50, 'Bus Pariwisata Indon', 'Patas');
INSERT INTO `bus` VALUES ('A10', 45, 'Sinar Jaya', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A100', 50, 'Wijaya Sakti', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A11', 40, 'Mega Jaya', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A12', 45, 'Prima Lestari', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A13', 50, 'Maju Bersama', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A14', 35, 'Cepat Jaya', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A15', 42, 'Harmoni Raya', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A16', 48, 'Sejahtera', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A17', 38, 'Murni Jaya', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A18', 47, 'Cemerlang', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A19', 43, 'Sinar Bahagia', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A20', 41, 'Indah Jaya', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A21', 36, 'Sentosa', 'Patas');
INSERT INTO `bus` VALUES ('A22', 44, 'Berlian', 'Bisnis/VIP');
INSERT INTO `bus` VALUES ('A23', 49, 'Purnama', 'Eksekutif');
INSERT INTO `bus` VALUES ('A24', 39, 'Mutiara', 'Super Eksekutif');
INSERT INTO `bus` VALUES ('A25', 46, 'Wijaya Kusuma', 'Suites');
INSERT INTO `bus` VALUES ('A26', 37, 'Makmur', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A27', 33, 'Sejahtera Raya', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A28', 51, 'Sentosa Lestari', 'Patas');
INSERT INTO `bus` VALUES ('A29', 55, 'Berlian Utama', 'Bisnis/VIP');
INSERT INTO `bus` VALUES ('A30', 60, 'Purnama Sejahtera', 'Eksekutif');
INSERT INTO `bus` VALUES ('A31', 53, 'Mutiara Bahagia', 'Super Eksekutif');
INSERT INTO `bus` VALUES ('A32', 52, 'Wijaya Sakti', 'Suites');
INSERT INTO `bus` VALUES ('A33', 47, 'Maju Jaya', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A34', 48, 'Damai Sentosa', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A35', 49, 'Nusantara Raya', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A36', 50, 'Sejahtera Baru', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A37', 55, 'Prima Sentosa', 'Bisnis/VIP');
INSERT INTO `bus` VALUES ('A38', 60, 'Lestari Makmur', 'Eksekutif');
INSERT INTO `bus` VALUES ('A39', 65, 'Berlian Murni', 'Super Eksekutif');
INSERT INTO `bus` VALUES ('A40', 70, 'Sinar Mulia', 'Suites');
INSERT INTO `bus` VALUES ('A41', 48, 'Berkah Sentosa', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A42', 49, 'Ratu Damai', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A43', 50, 'Pusaka Nusantara', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A44', 51, 'Sentosa Maju', 'Patas');
INSERT INTO `bus` VALUES ('A45', 52, 'Prima Berlian', 'Bisnis/VIP');
INSERT INTO `bus` VALUES ('A46', 53, 'Lestari Sejahtera', 'Eksekutif');
INSERT INTO `bus` VALUES ('A47', 54, 'Makmur Bahagia', 'Super Eksekutif');
INSERT INTO `bus` VALUES ('A48', 55, 'Murni Jaya Sentosa', 'Suites');
INSERT INTO `bus` VALUES ('A49', 45, 'Berkat Nusantara', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A50', 40, 'Purnama Damai', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A51', 38, 'Citra Sentosa', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A52', 33, 'Harapan Jaya', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A53', 32, 'Bersama Makmur', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A54', 30, 'Sentosa Jaya', 'Patas');
INSERT INTO `bus` VALUES ('A55', 28, 'Berlian Cepat', 'Bisnis/VIP');
INSERT INTO `bus` VALUES ('A56', 26, 'Purnama Harmoni', 'Eksekutif');
INSERT INTO `bus` VALUES ('A57', 24, 'Mutiara Sejahtera', 'Super Eksekutif');
INSERT INTO `bus` VALUES ('A58', 22, 'Wijaya Sentosa', 'Suites');
INSERT INTO `bus` VALUES ('A59', 20, 'Nusantara Jaya', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A60', 18, 'Damai Bersama', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A61', 16, 'Sentosa Bahagia', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A62', 14, 'Sejahtera Bersama', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A63', 12, 'Murni Harmoni', 'Patas');
INSERT INTO `bus` VALUES ('A64', 10, 'Berlian Maju', 'Bisnis/VIP');
INSERT INTO `bus` VALUES ('A65', 8, 'Purnama Bersama', 'Eksekutif');
INSERT INTO `bus` VALUES ('A66', 6, 'Mutiara Sentosa', 'Super Eksekutif');
INSERT INTO `bus` VALUES ('A67', 4, 'Wijaya Harmoni', 'Suites');
INSERT INTO `bus` VALUES ('A68', 30, 'Cepat Harmoni', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A69', 31, 'Raya Sentosa', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A70', 32, 'Maju Cepat', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A71', 33, 'Damai Maju', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A72', 34, 'Nusantara Cepat', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A73', 35, 'Sejahtera Raya', 'Patas');
INSERT INTO `bus` VALUES ('A74', 36, 'Berlian Cepat', 'Bisnis/VIP');
INSERT INTO `bus` VALUES ('A75', 37, 'Purnama Express', 'Eksekutif');
INSERT INTO `bus` VALUES ('A76', 38, 'Mutiara Lestari', 'Super Eksekutif');
INSERT INTO `bus` VALUES ('A77', 39, 'Wijaya Prima', 'Suites');
INSERT INTO `bus` VALUES ('A78', 40, 'Sentosa Cepat', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A79', 45, 'Prima Sentosa', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A80', 50, 'Maju Prima', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A81', 55, 'Cepat Sentosa', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A82', 60, 'Berlian Maju', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A83', 65, 'Purnama Prima', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A84', 70, 'Sejahtera Prima', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A85', 75, 'Mutiara Maju', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A86', 80, 'Wijaya Prima', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A87', 85, 'Sentosa Maju', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A88', 90, 'Prima Maju', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A89', 95, 'Maju Sentosa', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A90', 100, 'Berlian Sentosa', 'Ekonomi Non AC');
INSERT INTO `bus` VALUES ('A91', 42, 'Harmoni Raya', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A92', 38, 'Sejahtera', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A93', 44, 'Berlian', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A94', 46, 'Wijaya Kusuma', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A95', 39, 'Makmur', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A96', 43, 'Sentosa Lestari', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A97', 47, 'Berlian Utama', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A98', 45, 'Purnama Sejahtera', 'Ekonomi AC');
INSERT INTO `bus` VALUES ('A99', 48, 'Mutiara Bahagia', 'Ekonomi AC');

-- ----------------------------
-- Table structure for identitas_pemesan
-- ----------------------------
DROP TABLE IF EXISTS `identitas_pemesan`;
CREATE TABLE `identitas_pemesan`  (
  `id_identitas` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_pengguna` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_pemesanan` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_pemesan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipe_identitas` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nomor_identitas` char(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usia` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nomor_hp` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_identitas`) USING BTREE,
  INDEX `id_pengguna`(`id_pengguna` ASC) USING BTREE,
  INDEX `id_pemesanan`(`id_pemesanan` ASC) USING BTREE,
  CONSTRAINT `identitas_pemesan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`Id_pengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `identitas_pemesan_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`Id_pemesanan`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of identitas_pemesan
-- ----------------------------
INSERT INTO `identitas_pemesan` VALUES ('B536362047', '66595149685', 'I63606070010', 'ego mubi widiarto', 'KTP', '22051214085', '202', '081234567890');

-- ----------------------------
-- Table structure for jadwal
-- ----------------------------
DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE `jadwal`  (
  `Id_jadwal` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jam_keberangkatan` time NULL DEFAULT NULL,
  `jam_kedatangan` time NULL DEFAULT NULL,
  `Id_bus` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Id_jadwal`) USING BTREE,
  INDEX `Id_bus`(`Id_bus` ASC) USING BTREE,
  CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`Id_bus`) REFERENCES `bus` (`Id_bus`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jadwal
-- ----------------------------
INSERT INTO `jadwal` VALUES ('JA01', '13:00:00', '16:30:00', 'A10');
INSERT INTO `jadwal` VALUES ('JA02', '13:00:00', '14:30:00', 'A10');
INSERT INTO `jadwal` VALUES ('JA03', '14:30:00', '16:30:00', 'A10');
INSERT INTO `jadwal` VALUES ('JA04', '17:30:00', '20:30:00', 'A09');
INSERT INTO `jadwal` VALUES ('JA05', '17:30:00', '19:00:00', 'A09');
INSERT INTO `jadwal` VALUES ('JA06', '19:00:00', '20:30:00', 'A09');
INSERT INTO `jadwal` VALUES ('JA07', '08:00:00', '15:00:00', 'A11');
INSERT INTO `jadwal` VALUES ('JA08', '08:00:00', '11:00:00', 'A11');
INSERT INTO `jadwal` VALUES ('JA09', '11:00:00', '15:00:00', 'A11');
INSERT INTO `jadwal` VALUES ('JA10', '09:00:00', '12:00:00', 'A08');
INSERT INTO `jadwal` VALUES ('JA11', '09:00:00', '10:30:00', 'A08');
INSERT INTO `jadwal` VALUES ('JA12', '10:30:00', '12:00:00', 'A08');
INSERT INTO `jadwal` VALUES ('JA13', '13:00:00', '20:00:00', 'A07');
INSERT INTO `jadwal` VALUES ('JA14', '13:00:00', '18:00:00', 'A07');
INSERT INTO `jadwal` VALUES ('JA15', '18:00:00', '20:00:00', 'A07');

-- ----------------------------
-- Table structure for kursi
-- ----------------------------
DROP TABLE IF EXISTS `kursi`;
CREATE TABLE `kursi`  (
  `Id_kursi` int NOT NULL,
  `no_kursi` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Id_bus` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`Id_kursi`) USING BTREE,
  INDEX `Id_bus`(`Id_bus` ASC) USING BTREE,
  CONSTRAINT `kursi_ibfk_1` FOREIGN KEY (`Id_bus`) REFERENCES `bus` (`Id_bus`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kursi
-- ----------------------------
INSERT INTO `kursi` VALUES (1, 'A1', 'A10');
INSERT INTO `kursi` VALUES (2, 'A2', 'A10');
INSERT INTO `kursi` VALUES (3, 'A3', 'A10');
INSERT INTO `kursi` VALUES (4, 'B1', 'A10');
INSERT INTO `kursi` VALUES (5, 'B2', 'A10');
INSERT INTO `kursi` VALUES (6, 'C1', 'A10');
INSERT INTO `kursi` VALUES (7, 'C2', 'A10');
INSERT INTO `kursi` VALUES (8, 'C3', 'A10');
INSERT INTO `kursi` VALUES (9, 'D1', 'A10');
INSERT INTO `kursi` VALUES (10, 'D2', 'A10');
INSERT INTO `kursi` VALUES (11, 'E1', 'A10');
INSERT INTO `kursi` VALUES (12, 'E2', 'A10');
INSERT INTO `kursi` VALUES (13, 'E3', 'A10');
INSERT INTO `kursi` VALUES (14, 'F1', 'A10');
INSERT INTO `kursi` VALUES (15, 'F2', 'A10');
INSERT INTO `kursi` VALUES (16, 'G1', 'A10');
INSERT INTO `kursi` VALUES (17, 'G2', 'A10');
INSERT INTO `kursi` VALUES (18, 'G3', 'A10');
INSERT INTO `kursi` VALUES (19, 'H1', 'A10');
INSERT INTO `kursi` VALUES (20, 'H2', 'A10');
INSERT INTO `kursi` VALUES (21, 'I1', 'A10');
INSERT INTO `kursi` VALUES (22, 'I2', 'A10');
INSERT INTO `kursi` VALUES (23, 'I3', 'A10');
INSERT INTO `kursi` VALUES (24, 'J1', 'A10');
INSERT INTO `kursi` VALUES (25, 'J2', 'A10');
INSERT INTO `kursi` VALUES (26, 'K1', 'A10');
INSERT INTO `kursi` VALUES (27, 'K2', 'A10');
INSERT INTO `kursi` VALUES (28, 'K3', 'A10');
INSERT INTO `kursi` VALUES (29, 'L1', 'A10');
INSERT INTO `kursi` VALUES (30, 'L2', 'A10');
INSERT INTO `kursi` VALUES (31, 'M1', 'A10');
INSERT INTO `kursi` VALUES (32, 'M2', 'A10');
INSERT INTO `kursi` VALUES (33, 'M3', 'A10');
INSERT INTO `kursi` VALUES (34, 'N1', 'A10');
INSERT INTO `kursi` VALUES (35, 'N2', 'A10');
INSERT INTO `kursi` VALUES (36, 'O1', 'A10');
INSERT INTO `kursi` VALUES (37, 'O2', 'A10');
INSERT INTO `kursi` VALUES (38, 'O3', 'A10');
INSERT INTO `kursi` VALUES (39, 'P1', 'A10');
INSERT INTO `kursi` VALUES (40, 'P2', 'A10');
INSERT INTO `kursi` VALUES (41, 'Q1', 'A10');
INSERT INTO `kursi` VALUES (42, 'Q2', 'A10');
INSERT INTO `kursi` VALUES (43, 'Q3', 'A10');
INSERT INTO `kursi` VALUES (44, 'R1', 'A10');
INSERT INTO `kursi` VALUES (45, 'R2', 'A10');
INSERT INTO `kursi` VALUES (101, 'A1', 'A09');
INSERT INTO `kursi` VALUES (102, 'A2', 'A09');
INSERT INTO `kursi` VALUES (103, 'A3', 'A09');
INSERT INTO `kursi` VALUES (104, 'B1', 'A09');
INSERT INTO `kursi` VALUES (105, 'B2', 'A09');
INSERT INTO `kursi` VALUES (106, 'B3', 'A09');
INSERT INTO `kursi` VALUES (107, 'C1', 'A09');
INSERT INTO `kursi` VALUES (108, 'C2', 'A09');
INSERT INTO `kursi` VALUES (109, 'C3', 'A09');
INSERT INTO `kursi` VALUES (110, 'D1', 'A09');
INSERT INTO `kursi` VALUES (111, 'D2', 'A09');
INSERT INTO `kursi` VALUES (112, 'D3', 'A09');
INSERT INTO `kursi` VALUES (113, 'E1', 'A09');
INSERT INTO `kursi` VALUES (114, 'E2', 'A09');
INSERT INTO `kursi` VALUES (115, 'E3', 'A09');
INSERT INTO `kursi` VALUES (116, 'F1', 'A09');
INSERT INTO `kursi` VALUES (117, 'F2', 'A09');
INSERT INTO `kursi` VALUES (118, 'F3', 'A09');
INSERT INTO `kursi` VALUES (119, 'G1', 'A09');
INSERT INTO `kursi` VALUES (120, 'G2', 'A09');
INSERT INTO `kursi` VALUES (121, 'G2', 'A09');
INSERT INTO `kursi` VALUES (122, 'G3', 'A09');
INSERT INTO `kursi` VALUES (123, 'H1', 'A09');
INSERT INTO `kursi` VALUES (124, 'H2', 'A09');
INSERT INTO `kursi` VALUES (125, 'H3', 'A09');
INSERT INTO `kursi` VALUES (126, 'I1', 'A09');
INSERT INTO `kursi` VALUES (127, 'I2', 'A09');
INSERT INTO `kursi` VALUES (128, 'I3', 'A09');
INSERT INTO `kursi` VALUES (129, 'J1', 'A09');
INSERT INTO `kursi` VALUES (130, 'J2', 'A09');
INSERT INTO `kursi` VALUES (131, 'J3', 'A09');
INSERT INTO `kursi` VALUES (132, 'K1', 'A09');
INSERT INTO `kursi` VALUES (133, 'K2', 'A09');
INSERT INTO `kursi` VALUES (134, 'K3', 'A09');
INSERT INTO `kursi` VALUES (135, 'L1', 'A09');
INSERT INTO `kursi` VALUES (136, 'L2', 'A09');
INSERT INTO `kursi` VALUES (137, 'L3', 'A09');
INSERT INTO `kursi` VALUES (138, 'M1', 'A09');
INSERT INTO `kursi` VALUES (139, 'M2', 'A09');
INSERT INTO `kursi` VALUES (140, 'M3', 'A09');
INSERT INTO `kursi` VALUES (141, 'N1', 'A09');
INSERT INTO `kursi` VALUES (142, 'N2', 'A09');
INSERT INTO `kursi` VALUES (143, 'N3', 'A09');
INSERT INTO `kursi` VALUES (144, 'O1', 'A09');
INSERT INTO `kursi` VALUES (145, 'O2', 'A09');
INSERT INTO `kursi` VALUES (146, 'O3', 'A09');
INSERT INTO `kursi` VALUES (147, 'P1', 'A09');
INSERT INTO `kursi` VALUES (148, 'P2', 'A09');
INSERT INTO `kursi` VALUES (149, 'P3', 'A09');
INSERT INTO `kursi` VALUES (150, 'P4', 'A09');
INSERT INTO `kursi` VALUES (151, 'A1', 'A07');
INSERT INTO `kursi` VALUES (152, 'A2', 'A07');
INSERT INTO `kursi` VALUES (153, 'A3', 'A07');
INSERT INTO `kursi` VALUES (154, 'A4', 'A07');
INSERT INTO `kursi` VALUES (155, 'A5', 'A07');
INSERT INTO `kursi` VALUES (156, 'A6', 'A07');
INSERT INTO `kursi` VALUES (157, 'A7', 'A07');
INSERT INTO `kursi` VALUES (158, 'A8', 'A07');
INSERT INTO `kursi` VALUES (159, 'A9', 'A07');
INSERT INTO `kursi` VALUES (160, 'A10', 'A07');
INSERT INTO `kursi` VALUES (161, 'B1', 'A07');
INSERT INTO `kursi` VALUES (162, 'B2', 'A07');
INSERT INTO `kursi` VALUES (163, 'B3', 'A07');
INSERT INTO `kursi` VALUES (164, 'B4', 'A07');
INSERT INTO `kursi` VALUES (165, 'B5', 'A07');
INSERT INTO `kursi` VALUES (166, 'B6', 'A07');
INSERT INTO `kursi` VALUES (167, 'B7', 'A07');
INSERT INTO `kursi` VALUES (168, 'B8', 'A07');
INSERT INTO `kursi` VALUES (169, 'B9', 'A07');
INSERT INTO `kursi` VALUES (170, 'B10', 'A07');
INSERT INTO `kursi` VALUES (171, 'C1', 'A07');
INSERT INTO `kursi` VALUES (172, 'C2', 'A07');
INSERT INTO `kursi` VALUES (173, 'C3', 'A07');
INSERT INTO `kursi` VALUES (174, 'C4', 'A07');
INSERT INTO `kursi` VALUES (175, 'C5', 'A07');
INSERT INTO `kursi` VALUES (176, 'C6', 'A07');
INSERT INTO `kursi` VALUES (177, 'C7', 'A07');
INSERT INTO `kursi` VALUES (178, 'C8', 'A07');
INSERT INTO `kursi` VALUES (179, 'C9', 'A07');
INSERT INTO `kursi` VALUES (180, 'C10', 'A07');
INSERT INTO `kursi` VALUES (181, 'D1', 'A07');
INSERT INTO `kursi` VALUES (182, 'D2', 'A07');
INSERT INTO `kursi` VALUES (183, 'D3', 'A07');
INSERT INTO `kursi` VALUES (184, 'D4', 'A07');
INSERT INTO `kursi` VALUES (185, 'D5', 'A07');
INSERT INTO `kursi` VALUES (186, 'D6', 'A07');
INSERT INTO `kursi` VALUES (187, 'D7', 'A07');
INSERT INTO `kursi` VALUES (188, 'D8', 'A07');
INSERT INTO `kursi` VALUES (189, 'D9', 'A07');
INSERT INTO `kursi` VALUES (190, 'D10', 'A07');
INSERT INTO `kursi` VALUES (191, 'E1', 'A07');
INSERT INTO `kursi` VALUES (192, 'E2', 'A07');
INSERT INTO `kursi` VALUES (193, 'E3', 'A07');
INSERT INTO `kursi` VALUES (194, 'E4', 'A07');
INSERT INTO `kursi` VALUES (195, 'E5', 'A07');
INSERT INTO `kursi` VALUES (196, 'A1', 'A08');
INSERT INTO `kursi` VALUES (197, 'A2', 'A08');
INSERT INTO `kursi` VALUES (198, 'A3', 'A08');
INSERT INTO `kursi` VALUES (199, 'A4', 'A08');
INSERT INTO `kursi` VALUES (200, 'A5', 'A08');
INSERT INTO `kursi` VALUES (201, 'A6', 'A08');
INSERT INTO `kursi` VALUES (202, 'A7', 'A08');
INSERT INTO `kursi` VALUES (203, 'A8', 'A08');
INSERT INTO `kursi` VALUES (204, 'A9', 'A08');
INSERT INTO `kursi` VALUES (205, 'A10', 'A08');
INSERT INTO `kursi` VALUES (206, 'B1', 'A08');
INSERT INTO `kursi` VALUES (207, 'B2', 'A08');
INSERT INTO `kursi` VALUES (208, 'B3', 'A08');
INSERT INTO `kursi` VALUES (209, 'B4', 'A08');
INSERT INTO `kursi` VALUES (210, 'B5', 'A08');
INSERT INTO `kursi` VALUES (211, 'B6', 'A08');
INSERT INTO `kursi` VALUES (212, 'B7', 'A08');
INSERT INTO `kursi` VALUES (213, 'B8', 'A08');
INSERT INTO `kursi` VALUES (214, 'B9', 'A08');
INSERT INTO `kursi` VALUES (215, 'B10', 'A08');
INSERT INTO `kursi` VALUES (216, 'C1', 'A08');
INSERT INTO `kursi` VALUES (217, 'C2', 'A08');
INSERT INTO `kursi` VALUES (218, 'C3', 'A08');
INSERT INTO `kursi` VALUES (219, 'C4', 'A08');
INSERT INTO `kursi` VALUES (220, 'C5', 'A08');
INSERT INTO `kursi` VALUES (221, 'C6', 'A08');
INSERT INTO `kursi` VALUES (222, 'C7', 'A08');
INSERT INTO `kursi` VALUES (223, 'C8', 'A08');
INSERT INTO `kursi` VALUES (224, 'C9', 'A08');
INSERT INTO `kursi` VALUES (225, 'C10', 'A08');
INSERT INTO `kursi` VALUES (226, 'D1', 'A08');
INSERT INTO `kursi` VALUES (227, 'D2', 'A08');
INSERT INTO `kursi` VALUES (228, 'D3', 'A08');
INSERT INTO `kursi` VALUES (229, 'D4', 'A08');
INSERT INTO `kursi` VALUES (230, 'D5', 'A08');
INSERT INTO `kursi` VALUES (231, 'A1', 'A11');
INSERT INTO `kursi` VALUES (232, 'A2', 'A11');
INSERT INTO `kursi` VALUES (233, 'A3', 'A11');
INSERT INTO `kursi` VALUES (234, 'A4', 'A11');
INSERT INTO `kursi` VALUES (235, 'A5', 'A11');
INSERT INTO `kursi` VALUES (236, 'A6', 'A11');
INSERT INTO `kursi` VALUES (237, 'A7', 'A11');
INSERT INTO `kursi` VALUES (238, 'A8', 'A11');
INSERT INTO `kursi` VALUES (239, 'A9', 'A11');
INSERT INTO `kursi` VALUES (240, 'A10', 'A11');
INSERT INTO `kursi` VALUES (241, 'B1', 'A11');
INSERT INTO `kursi` VALUES (242, 'B2', 'A11');
INSERT INTO `kursi` VALUES (243, 'B3', 'A11');
INSERT INTO `kursi` VALUES (244, 'B4', 'A11');
INSERT INTO `kursi` VALUES (245, 'B5', 'A11');
INSERT INTO `kursi` VALUES (246, 'B6', 'A11');
INSERT INTO `kursi` VALUES (247, 'B7', 'A11');
INSERT INTO `kursi` VALUES (248, 'B8', 'A11');
INSERT INTO `kursi` VALUES (249, 'B9', 'A11');
INSERT INTO `kursi` VALUES (250, 'B10', 'A11');
INSERT INTO `kursi` VALUES (251, 'C1', 'A11');
INSERT INTO `kursi` VALUES (252, 'C2', 'A11');
INSERT INTO `kursi` VALUES (253, 'C3', 'A11');
INSERT INTO `kursi` VALUES (254, 'C4', 'A11');
INSERT INTO `kursi` VALUES (255, 'C5', 'A11');
INSERT INTO `kursi` VALUES (256, 'C6', 'A11');
INSERT INTO `kursi` VALUES (257, 'C7', 'A11');
INSERT INTO `kursi` VALUES (258, 'C8', 'A11');
INSERT INTO `kursi` VALUES (259, 'C9', 'A11');
INSERT INTO `kursi` VALUES (260, 'C10', 'A11');
INSERT INTO `kursi` VALUES (261, 'D1', 'A11');
INSERT INTO `kursi` VALUES (262, 'D2', 'A11');
INSERT INTO `kursi` VALUES (263, 'D3', 'A11');
INSERT INTO `kursi` VALUES (264, 'D4', 'A11');
INSERT INTO `kursi` VALUES (265, 'D5', 'A11');
INSERT INTO `kursi` VALUES (266, 'D6', 'A11');
INSERT INTO `kursi` VALUES (267, 'D7', 'A11');
INSERT INTO `kursi` VALUES (268, 'D8', 'A11');
INSERT INTO `kursi` VALUES (269, 'D9', 'A11');
INSERT INTO `kursi` VALUES (270, 'D10', 'A11');

-- ----------------------------
-- Table structure for melihat_jadwal
-- ----------------------------
DROP TABLE IF EXISTS `melihat_jadwal`;
CREATE TABLE `melihat_jadwal`  (
  `Id_jadwal` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Id_pemesanan` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  INDEX `Id_pemesanan`(`Id_pemesanan` ASC) USING BTREE,
  INDEX `Id_jadwal`(`Id_jadwal` ASC) USING BTREE,
  CONSTRAINT `melihat_jadwal_ibfk_1` FOREIGN KEY (`Id_pemesanan`) REFERENCES `pemesanan` (`Id_pemesanan`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `melihat_jadwal_ibfk_2` FOREIGN KEY (`Id_jadwal`) REFERENCES `jadwal` (`Id_jadwal`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of melihat_jadwal
-- ----------------------------
INSERT INTO `melihat_jadwal` VALUES ('JA13', 'A39829854329');
INSERT INTO `melihat_jadwal` VALUES ('JA02', 'A11229854329');

-- ----------------------------
-- Table structure for mengendarai_bus
-- ----------------------------
DROP TABLE IF EXISTS `mengendarai_bus`;
CREATE TABLE `mengendarai_bus`  (
  `Id_bus` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `NIP` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  INDEX `NIP`(`NIP` ASC) USING BTREE,
  INDEX `Id_bus`(`Id_bus` ASC) USING BTREE,
  CONSTRAINT `mengendarai_bus_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `sopir` (`NIP`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `mengendarai_bus_ibfk_2` FOREIGN KEY (`Id_bus`) REFERENCES `bus` (`Id_bus`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of mengendarai_bus
-- ----------------------------
INSERT INTO `mengendarai_bus` VALUES ('A10', '12345678');
INSERT INTO `mengendarai_bus` VALUES ('A09', '34567890');
INSERT INTO `mengendarai_bus` VALUES ('A11', '21098765');
INSERT INTO `mengendarai_bus` VALUES ('A12', '32198765');
INSERT INTO `mengendarai_bus` VALUES ('A13', '34567890');
INSERT INTO `mengendarai_bus` VALUES ('A14', '10987654');
INSERT INTO `mengendarai_bus` VALUES ('A15', '32109876');
INSERT INTO `mengendarai_bus` VALUES ('A16', '19876543');
INSERT INTO `mengendarai_bus` VALUES ('A17', '45678901');
INSERT INTO `mengendarai_bus` VALUES ('A18', '23456789');
INSERT INTO `mengendarai_bus` VALUES ('A19', '89012345');
INSERT INTO `mengendarai_bus` VALUES ('A20', '43210987');
INSERT INTO `mengendarai_bus` VALUES ('A21', '54321098');
INSERT INTO `mengendarai_bus` VALUES ('A22', '76543210');
INSERT INTO `mengendarai_bus` VALUES ('A23', '65432109');
INSERT INTO `mengendarai_bus` VALUES ('A07', '67890123');
INSERT INTO `mengendarai_bus` VALUES ('A08', '87654321');

-- ----------------------------
-- Table structure for pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran`  (
  `Id_pembayaran` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `metode_pembayaran` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `waktu_pembayaran` datetime NOT NULL,
  `status_pembayaran` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Id_pemesanan` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_bayar` int NULL DEFAULT NULL,
  PRIMARY KEY (`Id_pembayaran`) USING BTREE,
  INDEX `Id_pemesanan`(`Id_pemesanan` ASC) USING BTREE,
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`Id_pemesanan`) REFERENCES `pemesanan` (`Id_pemesanan`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------
INSERT INTO `pembayaran` VALUES ('R99257', 'E-Wallet', '2024-05-23 06:48:40', 'LUNAS', 'I63606070010', 200000);

-- ----------------------------
-- Table structure for pemesanan
-- ----------------------------
DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE `pemesanan`  (
  `Id_pemesanan` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah_pemesanan` int NOT NULL,
  `Id_pengguna` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Id_tiket` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_pemesanan` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`Id_pemesanan`) USING BTREE,
  INDEX `Id_pengguna`(`Id_pengguna` ASC) USING BTREE,
  INDEX `Id_tiket`(`Id_tiket` ASC) USING BTREE,
  CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`Id_pengguna`) REFERENCES `pengguna` (`Id_pengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`Id_tiket`) REFERENCES `tiket` (`Id_tiket`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pemesanan
-- ----------------------------
INSERT INTO `pemesanan` VALUES ('A11229854329', 2, 'P01', 'A12345', '2024-05-10 00:00:00');
INSERT INTO `pemesanan` VALUES ('A39829854329', 1, 'P02', 'A45689', '2024-05-10 00:00:00');
INSERT INTO `pemesanan` VALUES ('E98278744150', 1, 'P02', 'M29902', '2024-05-11 18:45:42');
INSERT INTO `pemesanan` VALUES ('I63606070010', 1, '66595149685', 'O31998', '2024-05-23 06:48:40');

-- ----------------------------
-- Table structure for pengguna
-- ----------------------------
DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE `pengguna`  (
  `Id_pengguna` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nomor_identitas` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `alamat` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nomor_hp` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipe_identitas` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id_pengguna`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pengguna
-- ----------------------------
INSERT INTO `pengguna` VALUES ('16778160012', '22051214098', 'ego mubi widiarto', '2024-01-14', 'trenggalek, jawa timur', '087874849029', 'widiartoego@gmail.com', '$2y$10$.1K0L6sVLKe6xYAdh7NwNee1y8i0DHLe61ulT9yawwj182j85GJOC', 'KTP');
INSERT INTO `pengguna` VALUES ('17702651049', '22051214098', 'widiarto ego', '2004-02-18', 'trenggalek, jawa timur', '087874849029', 'egowidiarto@gmail.com', '$2y$10$FHAxZxaI5JqtHuBJifZvfu1U8GhjulRrilJvAu3MQ16pcEuPqNXn6', 'KTP');
INSERT INTO `pengguna` VALUES ('2148926969', '22051214085', 'darren waluya', '0000-00-00', 'bandung, jawa barat', '085156710821', 'ardiantodarren@gmail.com', '$2y$10$ZSZBjIvOVLKPght8Xd2w0.zVC59d7QMlwQD.BkllpSjsFDuaZIcNC', 'KTP');
INSERT INTO `pengguna` VALUES ('66595149685', '', 'ego mubi widiarto', '0000-00-00', '', '', 'ego@gmail.com', '$2y$10$g7Ule8g7LHty5jYGtzJSxOKs5GTZp3r6l0qToP4gZ1bE4yBMSyc6i', 'Pilih Tipe');
INSERT INTO `pengguna` VALUES ('83513807115', '', 'toni', '0000-00-00', '', '', 'tyas@gmail.com', '$2y$10$xfSi4cFHCu7ZuY8vBzNaSuTPAWQCWlHCQPNItFddRAdA7PXZEp4bO', 'Pilih Tipe');
INSERT INTO `pengguna` VALUES ('P01', '22051214093', 'Seggy Ferdianza', '2003-10-04', 'Jl. Donorejo 2, No. 16', '089122309112', 'seggy.22093@mhs.unesa.ac.id', 'bismillah', 'KTP');
INSERT INTO `pengguna` VALUES ('P02', '22051214098', 'Ego Widiarto', '2003-05-03', 'jl. manukan iii, no. 11', '087874849029', 'ego.22098@mhs.unesa.ac.id', '$2y$10$HMfZoALSX/9BtTsjt3xWTua0hwqBSoHIjOUvaMqBP9ya65Euwpvoi', 'KTP');

-- ----------------------------
-- Table structure for rute_perjalanan
-- ----------------------------
DROP TABLE IF EXISTS `rute_perjalanan`;
CREATE TABLE `rute_perjalanan`  (
  `Id_rute` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jarak` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `waktu_perjalanan` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Id_jadwal` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `terminal_awal` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `terminal_akhir` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga` int NULL DEFAULT NULL,
  PRIMARY KEY (`Id_rute`) USING BTREE,
  INDEX `Id_jadwal`(`Id_jadwal` ASC) USING BTREE,
  INDEX `fk_terminal_awal`(`terminal_awal` ASC) USING BTREE,
  INDEX `fk_terminal_akhir`(`terminal_akhir` ASC) USING BTREE,
  CONSTRAINT `fk_terminal_akhir` FOREIGN KEY (`terminal_akhir`) REFERENCES `terminal` (`kode_terminal`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_terminal_awal` FOREIGN KEY (`terminal_awal`) REFERENCES `terminal` (`kode_terminal`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `rute_perjalanan_ibfk_1` FOREIGN KEY (`Id_jadwal`) REFERENCES `jadwal` (`Id_jadwal`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of rute_perjalanan
-- ----------------------------
INSERT INTO `rute_perjalanan` VALUES ('RE02', '52 km', '180 menit', 'JA02', 'KT103', 'KT102', 50000);
INSERT INTO `rute_perjalanan` VALUES ('RE03', '80 km', '180 menit', 'JA03', 'KT102', 'KT01', 80000);
INSERT INTO `rute_perjalanan` VALUES ('RE04', '116 km', '180 menit', 'JA04', 'KT102', 'KT01', 65000);
INSERT INTO `rute_perjalanan` VALUES ('RE05', '52 km', '180 menit', 'JA05', 'KT102', 'KT01', 45000);
INSERT INTO `rute_perjalanan` VALUES ('RE06', '76 km', '180 menit', 'JA06', 'KT102', 'KT01', 55000);
INSERT INTO `rute_perjalanan` VALUES ('RE07', '325 km', '180 menit', 'JA07', 'KT102', 'KT01', 90000);
INSERT INTO `rute_perjalanan` VALUES ('RE08', '116 km', '180 menit', 'JA08', 'KT102', 'KT01', 35000);
INSERT INTO `rute_perjalanan` VALUES ('RE09', '220 km', '180 menit', 'JA09', 'KT102', 'KT01', 60000);
INSERT INTO `rute_perjalanan` VALUES ('RE13', '444 km', '180 menit', 'JA13', 'KT102', 'KT01', 200000);
INSERT INTO `rute_perjalanan` VALUES ('RE15', '171 km', '180 menit', 'JA15', 'KT102', 'KT01', 60000);

-- ----------------------------
-- Table structure for sopir
-- ----------------------------
DROP TABLE IF EXISTS `sopir`;
CREATE TABLE `sopir`  (
  `NIP` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_lengkap` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nomor_hp` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`NIP`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of sopir
-- ----------------------------
INSERT INTO `sopir` VALUES ('10987654', 'Kartika Dewi', 'Jl. Melati No. 24, Bandar Lampung', '081023456789');
INSERT INTO `sopir` VALUES ('12345678', 'Agus Jatmiko', 'Jl. Pucang VII, No. 12', '086527891011');
INSERT INTO `sopir` VALUES ('19876543', 'Tono Prasetyo', 'Jl. Flamboyan No. 32, Makassar', '081901234568');
INSERT INTO `sopir` VALUES ('21098765', 'Lina Puspita', 'Jl. Kenari No. 6, Denpasar', '081134567890');
INSERT INTO `sopir` VALUES ('21987654', 'Ulfa Rahayu', 'Jl. Melati No. 36, Semarang', '081012345679');
INSERT INTO `sopir` VALUES ('23456789', 'Budi Utomo', 'Jl. Pagesangan Timur, No. 22', '088768800111');
INSERT INTO `sopir` VALUES ('32109876', 'Miftah Rahman', 'Jl. Anggrek No. 3, Batam', '081245678901');
INSERT INTO `sopir` VALUES ('32198765', 'Vina Fitri', 'Jl. Kenari No. 40, Bandung', '081123456780');
INSERT INTO `sopir` VALUES ('34567890', 'Ferdianto', 'Jl. Manukan Jaya, No. 11', '0865278910');
INSERT INTO `sopir` VALUES ('43210987', 'Nita Fitriana', 'Jl. Mawar No. 9, Samarinda', '081356789012');
INSERT INTO `sopir` VALUES ('45678901', 'Asep', 'Jl. Sujatmiko, No. 01', '088799000111');
INSERT INTO `sopir` VALUES ('54321098', 'Oktavianus Saputra', 'Jl. Kenanga No. 17, Padang', '081467890123');
INSERT INTO `sopir` VALUES ('56789012', 'Fitri Handayani', 'Jl. Cempaka No. 12, Malang', '085678901234');
INSERT INTO `sopir` VALUES ('65432109', 'Putri Aulia', 'Jl. Cempaka No. 20, Pekanbaru', '081578901234');
INSERT INTO `sopir` VALUES ('67890123', 'Gatot Sulistio', 'Jl. Dahlia No. 7, Semarang', '086789012345');
INSERT INTO `sopir` VALUES ('76543210', 'Qori Firdaus', 'Jl. Dahlia No. 25, Bandung', '081689012345');
INSERT INTO `sopir` VALUES ('78901234', 'Hana Putri', 'Jl. Teratai No. 15, Palembang', '087890123456');
INSERT INTO `sopir` VALUES ('87654321', 'Rani Amelia', 'Jl. Teratai No. 33, Surabaya', '081790123456');
INSERT INTO `sopir` VALUES ('89012345', 'Indah Sari', 'Jl. Sakura No. 21, Makassar', '088901234567');
INSERT INTO `sopir` VALUES ('90123456', 'Joko Wibowo', 'Jl. Flamboyan No. 18, Medan', '089012345678');
INSERT INTO `sopir` VALUES ('98740921', 'Aldi', 'Trenggalek, Jawa Timur', '087874849029');
INSERT INTO `sopir` VALUES ('98765432', 'Sari Indriani', 'Jl. Sakura No. 28, Jakarta Pusat', '081890123457');

-- ----------------------------
-- Table structure for terminal
-- ----------------------------
DROP TABLE IF EXISTS `terminal`;
CREATE TABLE `terminal`  (
  `kode_terminal` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lokasi` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_terminal` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`kode_terminal`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of terminal
-- ----------------------------
INSERT INTO `terminal` VALUES ('KT01', 'Kedungrejo, Kec. Waru, Kabupaten Sidoarjo, Jawa Timur', 'Terminal Purabaya');
INSERT INTO `terminal` VALUES ('KT02', 'Jl. Raden Intan No.1, Arjosari, Kec. Blimbing, Kota Malang, Jawa timur', 'Terminal Arjosari');
INSERT INTO `terminal` VALUES ('KT03', 'Giwangan, Kec. Umbulharjo, Kota Yogyakarta, DI Yogyakarta', 'Terminal Giwangan');
INSERT INTO `terminal` VALUES ('KT04', 'Patihan, Kec. Manguharjo, Kota Madiun, Jawa Timur', 'Terminal Purboyo');
INSERT INTO `terminal` VALUES ('KT05', 'Kota Langsa', 'Terminal Langsa');
INSERT INTO `terminal` VALUES ('KT06', 'Kota Lhokseumawe', 'Terminal Lhokseumawe');
INSERT INTO `terminal` VALUES ('KT07', 'Kabupaten Aceh Barat', 'Terminal Meulaboh');
INSERT INTO `terminal` VALUES ('KT08', 'Kota Banda Aceh', 'Terminal Batoh');
INSERT INTO `terminal` VALUES ('KT09', 'Kabupaten Aceh Tengah', 'Terminal Paya Ilang');
INSERT INTO `terminal` VALUES ('KT10', 'Kota Pematang Siantar', 'Terminal Tanjung Pinggir');
INSERT INTO `terminal` VALUES ('KT100', 'Kabupaten Wonogiri', 'Terminal Pracimantoro');
INSERT INTO `terminal` VALUES ('KT101', 'Kabupaten Wonogiri', 'Terminal Baturetno');
INSERT INTO `terminal` VALUES ('KT102', 'Kabupaten Wonogiri', 'Terminal Jatisrono');
INSERT INTO `terminal` VALUES ('KT103', 'Kabupaten Wonogiri', 'Terminal Purwantoro');
INSERT INTO `terminal` VALUES ('KT104', 'Kabupaten Klaten', 'Terminal Soekarno');
INSERT INTO `terminal` VALUES ('KT105', 'Kabupaten Kebumen', 'Terminal Kebumen');
INSERT INTO `terminal` VALUES ('KT106', 'Kota Semarang', 'Terminal Mangkang');
INSERT INTO `terminal` VALUES ('KT107', 'Kota Semarang', 'Terminal Penggaron');
INSERT INTO `terminal` VALUES ('KT108', 'Kota Pekalongan', 'Terminal Pekalongan');
INSERT INTO `terminal` VALUES ('KT109', 'Kabupaten Pemalang', 'Terminal Pemalang');
INSERT INTO `terminal` VALUES ('KT11', 'Kabupaten Tapanuli Utara', 'Terminal Madya Tarutung');
INSERT INTO `terminal` VALUES ('KT110', 'Kabupaten Banyumas', 'Terminal Bulupitu, Purwokerto');
INSERT INTO `terminal` VALUES ('KT111', 'Kabupaten Wonosobo', 'Terminal Mendolo');
INSERT INTO `terminal` VALUES ('KT112', 'Kabupaten Semarang', 'Terminal Bawen');
INSERT INTO `terminal` VALUES ('KT113', 'Kota Magelang', 'Terminal Tidar');
INSERT INTO `terminal` VALUES ('KT114', 'Kota Salatiga', 'Terminal Tingkir');
INSERT INTO `terminal` VALUES ('KT115', 'Kota Surakarta', 'Terminal Tirtonadi');
INSERT INTO `terminal` VALUES ('KT116', 'Kabupaten Kudus', 'Terminal Jati');
INSERT INTO `terminal` VALUES ('KT117', 'Kabupaten Purbalingga', 'Terminal Bobotsari');
INSERT INTO `terminal` VALUES ('KT118', 'Kabupaten Purbalingga', 'Terminal Purbalingga');
INSERT INTO `terminal` VALUES ('KT119', 'Kabupaten Demak', 'Terminal Demak');
INSERT INTO `terminal` VALUES ('KT12', 'Kota Sibolga', 'Terminal Sibolga');
INSERT INTO `terminal` VALUES ('KT120', 'Kabupaten Demak', 'Terminal Bintoro');
INSERT INTO `terminal` VALUES ('KT121', 'Kota Tegal', 'Terminal Tegal');
INSERT INTO `terminal` VALUES ('KT122', 'Kabupaten Grobogan', 'Terminal Purwodadi');
INSERT INTO `terminal` VALUES ('KT123', 'Kabupaten Boyolali', 'Terminal Penggung');
INSERT INTO `terminal` VALUES ('KT124', 'Kabupaten Sukoharjo', 'Terminal Kartasura');
INSERT INTO `terminal` VALUES ('KT125', 'Kabupaten Sukoharjo', 'Terminal Sukoharjo');
INSERT INTO `terminal` VALUES ('KT126', 'Kabupaten Karanganyar', 'Terminal Tegalgede');
INSERT INTO `terminal` VALUES ('KT127', 'Kabupaten Karanganyar', 'Terminal Tawangmangu');
INSERT INTO `terminal` VALUES ('KT128', 'Kabupaten Sragen', 'Terminal Pilangsari');
INSERT INTO `terminal` VALUES ('KT129', 'Kabupaten Temanggung', 'Terminal Madureso');
INSERT INTO `terminal` VALUES ('KT13', 'Kabupaten Labuhanbatu', 'Terminal Padang Bulan');
INSERT INTO `terminal` VALUES ('KT130', 'Kabupaten Magelang', 'Terminal Muntilan');
INSERT INTO `terminal` VALUES ('KT131', 'Kabupaten Banjarnegara', 'Terminal Mandiraja');
INSERT INTO `terminal` VALUES ('KT132', 'Kabupaten Banjarnegara', 'Terminal Banjarnegara');
INSERT INTO `terminal` VALUES ('KT133', 'Kabupaten Brebes', 'Terminal Bumiayu');
INSERT INTO `terminal` VALUES ('KT134', 'Kabupaten Brebes', 'Terminal Tanjung');
INSERT INTO `terminal` VALUES ('KT135', 'Kabupaten Pekalongan', 'Terminal Kajen');
INSERT INTO `terminal` VALUES ('KT136', 'Kabupaten Batang', 'Terminal Banyuputih');
INSERT INTO `terminal` VALUES ('KT137', 'Kabupaten Gunung Kidul', 'Terminal Dhaksinarga');
INSERT INTO `terminal` VALUES ('KT138', 'Kabupaten Sleman', 'Terminal Jombor');
INSERT INTO `terminal` VALUES ('KT139', 'Kabupaten Bantul', 'Terminal Palbapang');
INSERT INTO `terminal` VALUES ('KT14', 'Kota Medan', 'Terminal Amplas');
INSERT INTO `terminal` VALUES ('KT140', 'Kabupaten Kulon Progo', 'Terminal Wates');
INSERT INTO `terminal` VALUES ('KT141', 'Kota Malang', 'Terminal Hamid Rusdi');
INSERT INTO `terminal` VALUES ('KT142', 'Kota Malang', 'Terminal Landungsari');
INSERT INTO `terminal` VALUES ('KT143', 'Kabupaten Sumenep', 'Terminal Arya Wiraraja');
INSERT INTO `terminal` VALUES ('KT144', 'Kabupaten Bangkalan', 'Terminal Bangkalan');
INSERT INTO `terminal` VALUES ('KT145', 'Kota Probolinggo', 'Terminal Bayuangga');
INSERT INTO `terminal` VALUES ('KT146', 'Kabupaten Tulungagung', 'Terminal Gayatri');
INSERT INTO `terminal` VALUES ('KT147', 'Kabupaten Ngawi', 'Terminal Kertonegoro');
INSERT INTO `terminal` VALUES ('KT148', 'Kabupaten Ngawi', 'Terminal Gendingan');
INSERT INTO `terminal` VALUES ('KT149', 'Kabupaten Ngawi', 'Terminal Ngrambe');
INSERT INTO `terminal` VALUES ('KT15', 'Kota Medan', 'Terminal Pinang Baris');
INSERT INTO `terminal` VALUES ('KT150', 'Kabupaten Pacitan', 'Terminal Pacitan');
INSERT INTO `terminal` VALUES ('KT151', 'Kabupaten Pacitan', 'Terminal Ngadirojo');
INSERT INTO `terminal` VALUES ('KT152', 'Kota Blitar', 'Terminal Patria');
INSERT INTO `terminal` VALUES ('KT153', 'Kabupaten Ponorogo', 'Terminal Selo Aji');
INSERT INTO `terminal` VALUES ('KT154', 'Kota Kediri', 'Terminal Tamanan');
INSERT INTO `terminal` VALUES ('KT155', 'Kabupaten Jember', 'Terminal Tawangalun');
INSERT INTO `terminal` VALUES ('KT156', 'Kabupaten Jember', 'Terminal Ambulu');
INSERT INTO `terminal` VALUES ('KT157', 'Kabupaten Jember', 'Terminal Arjasa');
INSERT INTO `terminal` VALUES ('KT158', 'Kabupaten Trenggalek', 'Terminal Surodakan');
INSERT INTO `terminal` VALUES ('KT159', 'Kabupaten Bojonegoro', 'Terminal Rajekwesi');
INSERT INTO `terminal` VALUES ('KT16', 'Kota Padang', 'Terminal Anak Air');
INSERT INTO `terminal` VALUES ('KT160', 'Kabupaten Bojonegoro', 'Terminal Padangan');
INSERT INTO `terminal` VALUES ('KT161', 'Kabupaten Bojonegoro', 'Terminal Temayang');
INSERT INTO `terminal` VALUES ('KT162', 'Kabupaten Bojonegoro', 'Terminal Betek');
INSERT INTO `terminal` VALUES ('KT163', 'Kabupaten Pasuruan', 'Terminal Pasuruan');
INSERT INTO `terminal` VALUES ('KT164', 'Kabupaten Tuban', 'Terminal Kembang Putih');
INSERT INTO `terminal` VALUES ('KT165', 'Kabupaten Banyuwangi', 'Terminal Sri Tanjung');
INSERT INTO `terminal` VALUES ('KT166', 'Kabupaten Banyuwangi', 'Terminal Brawijaya');
INSERT INTO `terminal` VALUES ('KT167', 'Kota Surabaya', 'Terminal Osowilangun');
INSERT INTO `terminal` VALUES ('KT168', 'Kabupaten Sidoarjo', 'Terminal Larangan');
INSERT INTO `terminal` VALUES ('KT169', 'Kabupaten Mojokerto', 'Terminal Kertajaya');
INSERT INTO `terminal` VALUES ('KT17', 'Kabupaten Sijunjung', 'Terminal Kiliran Jao');
INSERT INTO `terminal` VALUES ('KT170', 'Kabupaten Lamongan', 'Terminal Lamongan');
INSERT INTO `terminal` VALUES ('KT171', 'Kabupaten Gresik', 'Terminal Bunder');
INSERT INTO `terminal` VALUES ('KT172', 'Kabupaten Nganjuk', 'Terminal Anjuk Ladang');
INSERT INTO `terminal` VALUES ('KT173', 'Kabupaten Madiun', 'Terminal Caruban');
INSERT INTO `terminal` VALUES ('KT174', 'Kabupaten Magetan', 'Terminal Maospati');
INSERT INTO `terminal` VALUES ('KT175', 'Kabupaten Magetan', 'Terminal Magetan');
INSERT INTO `terminal` VALUES ('KT176', 'Kabupaten Blitar', 'Terminal Kesamben');
INSERT INTO `terminal` VALUES ('KT177', 'Kota Batu', 'Terminal Batu');
INSERT INTO `terminal` VALUES ('KT178', 'Kota Pasuruan', 'Terminal Untung Suropati');
INSERT INTO `terminal` VALUES ('KT179', 'Kabupaten Lumajang', 'Terminal Minak Koncar');
INSERT INTO `terminal` VALUES ('KT18', 'Kota Solok', 'Terminal Bareh Solok');
INSERT INTO `terminal` VALUES ('KT180', 'Kabupaten Bondowoso', 'Terminal Bondowoso');
INSERT INTO `terminal` VALUES ('KT181', 'Kabupaten Situbondo', 'Terminal Situbondo');
INSERT INTO `terminal` VALUES ('KT182', 'Kabupaten Sampang', 'Terminal Trunojoyo');
INSERT INTO `terminal` VALUES ('KT183', 'Kabupaten Pamekasan', 'Terminal Ronggo Sukowati');
INSERT INTO `terminal` VALUES ('KT184', 'Kabupaten Badung', 'Terminal Mengwi');
INSERT INTO `terminal` VALUES ('KT185', 'Kota Mataram', 'Terminal Mandalika');
INSERT INTO `terminal` VALUES ('KT186', 'Kabupaten Sumbawa', 'Terminal Sumer Payung');
INSERT INTO `terminal` VALUES ('KT187', 'Kota Bima', 'Terminal Dara');
INSERT INTO `terminal` VALUES ('KT188', 'Kabupaten Timor Tengah Utara', 'Terminal Kefamenanu');
INSERT INTO `terminal` VALUES ('KT189', 'Kota Kupang', 'Terminal Bimoku');
INSERT INTO `terminal` VALUES ('KT19', 'Kota Bukittinggi', 'Terminal Simpang Aur');
INSERT INTO `terminal` VALUES ('KT190', 'Kota Kupang', 'Terminal Oebobo');
INSERT INTO `terminal` VALUES ('KT191', 'Kabupaten Kupang', 'Terminal Noelbaki');
INSERT INTO `terminal` VALUES ('KT192', 'Kabupaten Timor Tengah Selatan', 'Terminal Haumeni');
INSERT INTO `terminal` VALUES ('KT193', 'Kabupaten Belu', 'Terminal Fatubenao');
INSERT INTO `terminal` VALUES ('KT194', 'Kabupaten Flores Timur', 'Terminal Lamawalang');
INSERT INTO `terminal` VALUES ('KT195', 'Kabupaten Sikka', 'Terminal Madawat');
INSERT INTO `terminal` VALUES ('KT196', 'Kabupaten Sikka', 'Terminal Lokarya');
INSERT INTO `terminal` VALUES ('KT197', 'Kabupaten Ende', 'Terminal Ndao');
INSERT INTO `terminal` VALUES ('KT198', 'Kabupaten Ende', 'Terminal Reworeke');
INSERT INTO `terminal` VALUES ('KT199', 'Kabupaten Ngada', 'Terminal Watujaji');
INSERT INTO `terminal` VALUES ('KT20', 'Kota Pariaman', 'Terminal Jati Pariaman');
INSERT INTO `terminal` VALUES ('KT200', 'Kabupaten Manggarai', 'Terminal Mena');
INSERT INTO `terminal` VALUES ('KT201', 'Kabupaten Manggarai Barat', 'Terminal Nggorang');
INSERT INTO `terminal` VALUES ('KT202', 'Kabupaten Sumba Timur', 'Terminal Lambanapu');
INSERT INTO `terminal` VALUES ('KT203', 'Kabupaten Sumba Barat Daya', 'Terminal Waikelo');
INSERT INTO `terminal` VALUES ('KT204', 'Kabupaten Sumba Barat', 'Terminal Waikabubak');
INSERT INTO `terminal` VALUES ('KT205', 'Kabupaten Kubu Raya', 'Terminal Sei Ambawang');
INSERT INTO `terminal` VALUES ('KT206', 'Kota Singkawang', 'Terminal Singkawang');
INSERT INTO `terminal` VALUES ('KT207', 'Kota Palangkaraya', 'Terminal Gara');
INSERT INTO `terminal` VALUES ('KT208', 'Kabupaten Banjar', 'Terminal Gambut Barakat');
INSERT INTO `terminal` VALUES ('KT209', 'Kota Balikpapan', 'Terminal Batu Ampar');
INSERT INTO `terminal` VALUES ('KT21', 'Kabupaten Kampar', 'Terminal Bangkinang');
INSERT INTO `terminal` VALUES ('KT210', 'Kota Samarinda', 'Terminal Samarinda');
INSERT INTO `terminal` VALUES ('KT211', 'Kabupaten Bolaang Mongondow Utara', 'Terminal Boroko');
INSERT INTO `terminal` VALUES ('KT212', 'Kota Manado', 'Terminal Malalayang');
INSERT INTO `terminal` VALUES ('KT213', 'Kota Manado', 'Terminal Paal Dua');
INSERT INTO `terminal` VALUES ('KT214', 'Kota Manado', 'Terminal Karombasan');
INSERT INTO `terminal` VALUES ('KT215', 'Kota Bitung', 'Terminal Tangkoko');
INSERT INTO `terminal` VALUES ('KT216', 'Kabupaten Minahasa', 'Terminal Tondano');
INSERT INTO `terminal` VALUES ('KT217', 'Kabupaten Minahasa', 'Terminal Langowan');
INSERT INTO `terminal` VALUES ('KT218', 'Kabupaten Minahasa Utara', 'Terminal Tumatenden');
INSERT INTO `terminal` VALUES ('KT219', 'Kabupaten Bolaang Mongondow', 'Terminal Bolaang Mongondow');
INSERT INTO `terminal` VALUES ('KT22', 'Kota Pekanbaru', 'Terminal Payung Sekaki');
INSERT INTO `terminal` VALUES ('KT220', 'Kabupaten Gorontalo', 'Terminal Isimu');
INSERT INTO `terminal` VALUES ('KT221', 'Kota Gorontalo', 'Terminal Dungingi');
INSERT INTO `terminal` VALUES ('KT222', 'Kabupaten Poso', 'Terminal Kasintuwu');
INSERT INTO `terminal` VALUES ('KT223', 'Kota Palu', 'Terminal Mamboro');
INSERT INTO `terminal` VALUES ('KT224', 'Kabupaten Mamuju', 'Terminal Simbuang');
INSERT INTO `terminal` VALUES ('KT225', 'Kabupaten Polewali Mandar', 'Terminal Tipalayo');
INSERT INTO `terminal` VALUES ('KT226', 'Kota Pare-Pare', 'Terminal Lumpue');
INSERT INTO `terminal` VALUES ('KT227', 'Kota Pare-Pare', 'Terminal Soreang');
INSERT INTO `terminal` VALUES ('KT228', 'Kabupaten Barru', 'Terminal Sessu Pekkae');
INSERT INTO `terminal` VALUES ('KT229', 'Kabupaten Barru', 'Terminal Mattirowalie');
INSERT INTO `terminal` VALUES ('KT23', 'Kota Dumai', 'Terminal Dumai');
INSERT INTO `terminal` VALUES ('KT230', 'Kabupaten Bone', 'Terminal Petta Pongawai');
INSERT INTO `terminal` VALUES ('KT231', 'Kabupaten Wajo', 'Terminal Callacu');
INSERT INTO `terminal` VALUES ('KT232', 'Kota Makassar', 'Terminal Daya');
INSERT INTO `terminal` VALUES ('KT233', 'Kota Makassar', 'Terminal Malengkeri');
INSERT INTO `terminal` VALUES ('KT234', 'Kabupaten Maros', 'Terminal Maros');
INSERT INTO `terminal` VALUES ('KT235', 'Kabupaten Pangkajene Kepulauan', 'Terminal Pangkajene');
INSERT INTO `terminal` VALUES ('KT236', 'Kabupaten Pinrang', 'Terminal Pinrang');
INSERT INTO `terminal` VALUES ('KT237', 'Kabupaten Sidenreng Rappang', 'Terminal Lao Woi');
INSERT INTO `terminal` VALUES ('KT238', 'Kabupaten Soppeng', 'Terminal Soppeng');
INSERT INTO `terminal` VALUES ('KT239', 'Kabupaten Luwu', 'Terminal Luwu');
INSERT INTO `terminal` VALUES ('KT24', 'Kabupaten Indragiri Hulu', 'Terminal Gerbangsari');
INSERT INTO `terminal` VALUES ('KT240', 'Kota Palopo', 'Terminal Dangerakko');
INSERT INTO `terminal` VALUES ('KT241', 'Kabupaten Sinjai', 'Terminal Tellulimpoe');
INSERT INTO `terminal` VALUES ('KT242', 'Kabupaten Jeneponto', 'Terminal Karisa');
INSERT INTO `terminal` VALUES ('KT243', 'Kabupaten Bantaeng', 'Terminal Bantaeng');
INSERT INTO `terminal` VALUES ('KT244', 'Kabupaten Gowa', 'Terminal Cappa Bungaya');
INSERT INTO `terminal` VALUES ('KT245', 'Kabupaten Takalar', 'Terminal Takalar');
INSERT INTO `terminal` VALUES ('KT246', 'Kota Kendari', 'Terminal Puuwatu');
INSERT INTO `terminal` VALUES ('KT247', 'Kota Jayapura', 'Terminal Entrop');
INSERT INTO `terminal` VALUES ('KT25', 'Kota Jambi', 'Terminal Alam Barajo');
INSERT INTO `terminal` VALUES ('KT26', 'Kabupaten Bungo', 'Terminal Muaro Bungo');
INSERT INTO `terminal` VALUES ('KT27', 'Kabupaten Merangin', 'Terminal Bangko');
INSERT INTO `terminal` VALUES ('KT28', 'Kabupaten Sarolangun', 'Terminal Sribulan');
INSERT INTO `terminal` VALUES ('KT29', 'Kota Palembang', 'Terminal Alang Lebar');
INSERT INTO `terminal` VALUES ('KT30', 'Kota Palembang', 'Terminal Karya Jaya');
INSERT INTO `terminal` VALUES ('KT31', 'Kabupaten Ogan Komering Ilir', 'Terminal Kayuagung');
INSERT INTO `terminal` VALUES ('KT32', 'Kabupaten Ogan Komering Ulu', 'Terminal Batu Kuning');
INSERT INTO `terminal` VALUES ('KT33', 'Kabupaten Banyuasin', 'Terminal Betung');
INSERT INTO `terminal` VALUES ('KT34', 'Kota Lubuklinggau', 'Terminal Simpang Priuk');
INSERT INTO `terminal` VALUES ('KT35', 'Kabupaten Lahat', 'Terminal Lahat');
INSERT INTO `terminal` VALUES ('KT36', 'Kabupaten Rejang Lebong', 'Terminal Simpang Nangka');
INSERT INTO `terminal` VALUES ('KT37', 'Kota Bengkulu', 'Terminal Air Sebakul');
INSERT INTO `terminal` VALUES ('KT38', 'Kota Bandar Lampung', 'Terminal Rajabasa');
INSERT INTO `terminal` VALUES ('KT39', 'Kabupaten Lampung Tengah', 'Terminal Betan Subing');
INSERT INTO `terminal` VALUES ('KT40', 'Kota Serang', 'Terminal Pakupatan');
INSERT INTO `terminal` VALUES ('KT41', 'Kabupaten Pandeglang', 'Terminal Labuan');
INSERT INTO `terminal` VALUES ('KT42', 'Kabupaten Lebak', 'Terminal Mandala');
INSERT INTO `terminal` VALUES ('KT43', 'Kota Cilegon', 'Terminal Merak');
INSERT INTO `terminal` VALUES ('KT44', 'Kota Tangerang', 'Terminal Poris Plawad');
INSERT INTO `terminal` VALUES ('KT45', 'Kota Tangerang Selatan', 'Terminal Pondok Cabe');
INSERT INTO `terminal` VALUES ('KT46', 'Kota Jakarta Timur', 'Terminal Kampung Rambutan');
INSERT INTO `terminal` VALUES ('KT47', 'Kota Jakarta Barat', 'Terminal Kalideres');
INSERT INTO `terminal` VALUES ('KT48', 'Kota Jakarta Selatan', 'Terminal Blok M');
INSERT INTO `terminal` VALUES ('KT49', 'Kota Jakarta Timur', 'Terminal Cililitan');
INSERT INTO `terminal` VALUES ('KT50', 'Kota Jakarta Barat', 'Terminal Grogol');
INSERT INTO `terminal` VALUES ('KT51', 'Kota Jakarta Barat', 'Terminal Jakarta Kota');
INSERT INTO `terminal` VALUES ('KT52', 'Kota Jakarta Timur', 'Terminal Kampung Melayu');
INSERT INTO `terminal` VALUES ('KT53', 'Kota Jakarta Timur', 'Terminal Klender');
INSERT INTO `terminal` VALUES ('KT54', 'Kota Jakarta Selatan', 'Terminal Lebak Bulus');
INSERT INTO `terminal` VALUES ('KT55', 'Kota Jakarta Selatan', 'Terminal Manggarai');
INSERT INTO `terminal` VALUES ('KT56', 'Kota Jakarta Utara', 'Terminal Muara Angke');
INSERT INTO `terminal` VALUES ('KT57', 'Kota Jakarta Selatan', 'Terminal Pasar Minggu');
INSERT INTO `terminal` VALUES ('KT58', 'Kota Jakarta Timur', 'Terminal Pinang Ranti');
INSERT INTO `terminal` VALUES ('KT59', 'Kota Jakarta Timur', 'Terminal Pulo Gadung');
INSERT INTO `terminal` VALUES ('KT60', 'Kota Jakarta Selatan', 'Terminal Ragunan');
INSERT INTO `terminal` VALUES ('KT61', 'Kota Jakarta Timur', 'Terminal Rawamangun');
INSERT INTO `terminal` VALUES ('KT62', 'Kota Jakarta Pusat', 'Terminal Pasar Senen');
INSERT INTO `terminal` VALUES ('KT63', 'Kota Jakarta Utara', 'Terminal Tanjung Priok');
INSERT INTO `terminal` VALUES ('KT64', 'Kota Sukabumi', 'Terminal K.H. Ahmad Sanusi');
INSERT INTO `terminal` VALUES ('KT65', 'Kabupaten Sumedang', 'Terminal Ciakar');
INSERT INTO `terminal` VALUES ('KT66', 'Kabupaten Garut', 'Terminal Guntur');
INSERT INTO `terminal` VALUES ('KT67', 'Kabupaten Garut', 'Terminal Pameungpeuk');
INSERT INTO `terminal` VALUES ('KT68', 'Kota Cirebon', 'Terminal Harjamukti');
INSERT INTO `terminal` VALUES ('KT69', 'Kota Tasikmalaya', 'Terminal Indihiang');
INSERT INTO `terminal` VALUES ('KT70', 'Kabupaten Kuningan', 'Terminal Kertawangunan');
INSERT INTO `terminal` VALUES ('KT71', 'Kabupaten Subang', 'Terminal Subang');
INSERT INTO `terminal` VALUES ('KT72', 'Kota Banjar', 'Terminal Banjar Patroman');
INSERT INTO `terminal` VALUES ('KT73', 'Kabupaten Karawang', 'Terminal Cikampek');
INSERT INTO `terminal` VALUES ('KT74', 'Kota Bogor', 'Terminal Baranangsiang');
INSERT INTO `terminal` VALUES ('KT75', 'Kota Bekasi', 'Terminal Bekasi');
INSERT INTO `terminal` VALUES ('KT76', 'Kota Bekasi', 'Terminal Jatiasih');
INSERT INTO `terminal` VALUES ('KT77', 'Kabupaten Bekasi', 'Terminal Cikarang');
INSERT INTO `terminal` VALUES ('KT78', 'Kota Depok', 'Terminal Depok');
INSERT INTO `terminal` VALUES ('KT79', 'Kota Depok', 'Terminal Jatijajar');
INSERT INTO `terminal` VALUES ('KT80', 'Kota Depok', 'Terminal Sawangan');
INSERT INTO `terminal` VALUES ('KT81', 'Kota Bandung', 'Terminal Cicaheum');
INSERT INTO `terminal` VALUES ('KT82', 'Kota Bandung', 'Terminal Leuwipanjang');
INSERT INTO `terminal` VALUES ('KT83', 'Kota Bandung', 'Terminal Ciroyom');
INSERT INTO `terminal` VALUES ('KT84', 'Kota Bandung', 'Terminal Ledeng');
INSERT INTO `terminal` VALUES ('KT85', 'Kabupaten Sukabumi', 'Terminal Palabuhanratu');
INSERT INTO `terminal` VALUES ('KT86', 'Kabupaten Tasikmalaya', 'Terminal Singaparna');
INSERT INTO `terminal` VALUES ('KT87', 'Kabupaten Ciamis', 'Terminal Ciamis');
INSERT INTO `terminal` VALUES ('KT88', 'Kabupaten Pangandaran', 'Terminal Pangandaran');
INSERT INTO `terminal` VALUES ('KT89', 'Kabupaten Cirebon', 'Terminal Sumber');
INSERT INTO `terminal` VALUES ('KT90', 'Kabupaten Cirebon', 'Terminal Losari');
INSERT INTO `terminal` VALUES ('KT91', 'Kabupaten Cirebon', 'Terminal Ciledung');
INSERT INTO `terminal` VALUES ('KT92', 'Kabupaten Indramayu', 'Terminal Indramayu');
INSERT INTO `terminal` VALUES ('KT93', 'Kabupaten Purworejo', 'Terminal Purworejo');
INSERT INTO `terminal` VALUES ('KT94', 'Kabupaten Purworejo', 'Terminal Suronegaran');
INSERT INTO `terminal` VALUES ('KT95', 'Kabupaten Purworejo', 'Terminal Nampurejo');
INSERT INTO `terminal` VALUES ('KT96', 'Kabupaten Blora', 'Terminal Cepu');
INSERT INTO `terminal` VALUES ('KT97', 'Kabupaten Blora', 'Terminal Gagak Rimang');
INSERT INTO `terminal` VALUES ('KT98', 'Kabupaten Cilacap', 'Terminal Bangun Desa');
INSERT INTO `terminal` VALUES ('KT99', 'Kabupaten Wonogiri', 'Terminal Giri Adipura');

-- ----------------------------
-- Table structure for tiket
-- ----------------------------
DROP TABLE IF EXISTS `tiket`;
CREATE TABLE `tiket`  (
  `Id_tiket` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Id_bus` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Id_kursi` int NULL DEFAULT NULL,
  `tanggal_keberangkatan` date NULL DEFAULT NULL,
  `Id_rute` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id_tiket`) USING BTREE,
  INDEX `Id_bus`(`Id_bus` ASC) USING BTREE,
  INDEX `Id_kursi`(`Id_kursi` ASC) USING BTREE,
  INDEX `fk_rute_perjalanan`(`Id_rute` ASC) USING BTREE,
  CONSTRAINT `fk_rute_perjalanan` FOREIGN KEY (`Id_rute`) REFERENCES `rute_perjalanan` (`Id_rute`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`Id_bus`) REFERENCES `bus` (`Id_bus`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`Id_kursi`) REFERENCES `kursi` (`Id_kursi`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tiket
-- ----------------------------
INSERT INTO `tiket` VALUES ('A12345', 'A09', 108, '2024-05-25', 'RE04');
INSERT INTO `tiket` VALUES ('A12355', 'A07', 171, '2024-05-10', 'RE15');
INSERT INTO `tiket` VALUES ('A45689', 'A10', 6, '2024-05-10', 'RE02');
INSERT INTO `tiket` VALUES ('M29902', 'A09', 150, '2024-05-25', 'RE05');
INSERT INTO `tiket` VALUES ('O31998', 'A07', 188, '2024-05-25', 'RE13');

SET FOREIGN_KEY_CHECKS = 1;
