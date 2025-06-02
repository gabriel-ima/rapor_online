CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    role ENUM('guru', 'wali_kelas', 'kepala_sekolah', 'siswa') NOT NULL
);

INSERT INTO users (username, password, role) VALUES
-- data guru
('Imas Komariah, S.Pd', '19690727', 'guru'), 
('Elis Suryani, S.Pd', '19670216', 'guru'), 
('Eka Ellyawati, S.Pd.M.M', '19810727', 'guru'), 
('Eka Merdekasari, S.Pd', '19850810', 'guru'), 
('Ucu Siti Meilani, S.Pd', '68377716', 'guru'),
('Hasanudin, S.Pd.I', '19851012', 'guru'), 
('Febi Febriani, S.Pd', '19910228', 'guru'), 
('Ayuni Maulidia, S.Pd', '68377715', 'guru'),
('Ratih, S.Pd', '68377717', 'guru'), 
('Koh Roo Ye Amelia', '19851013', 'guru'), 
-- data wali kelas
('Imas Komariah', '19000001', 'wali_kelas'), -- nama tanpa gelar karna nama & pass ga boleh sama sma data guru
('Elis Suryani', '19000002', 'wali_kelas'), -- nama tanpa gelar karna nama & pass ga boleh sama sma data guru
('Eka Ellyawati', '19000003', 'wali_kelas'), -- nama tanpa gelar karna nama & pass ga boleh sama sma data guru
('Eka Merdekasari', '19000004', 'wali_kelas'), -- nama tanpa gelar karna nama & pass ga boleh sama sma data guru
('Ucu Siti Meilani', '19000005', 'wali_kelas'), -- nama tanpa gelar karna nama & pass ga boleh sama sma data guru
('Ayuni Maulidia', '19000006', 'wali_kelas'), -- nama tanpa gelar karna nama & pass ga boleh sama sma data guru
-- data kepala sekolah 
('Sri Isyana Kusuma Dewi, S.Pd', '19690727', 'kepala_sekolah'), 
-- data siswa-siswi
('Jonathan Prasetyo', '12072009', 'siswa'),
('Maria Angeline Siregar', '05032008', 'siswa'),
('Fajar Ramadhan Putra', '22092007', 'siswa'),
('Sherly Anindya Wijaya', '30122009', 'siswa'),
('Kevin Alvaro Nugroho', '14022010', 'siswa'),
('Nabila Zahra Maulida', '17112008', 'siswa'),
('Rizky Dwi Saputra', '01062009', 'siswa');