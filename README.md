## <p align="center" style="margin-top: 0;">SwimZone – Reservasi Kolam Renang</p>

<p align="center">
  <img src="/public/LogoUnsulbar 1.png" width="300" alt="LogoUnsulbar" />
</p>

### <p align="center">DHIMAS NURYANTO</p>

### <p align="center">D0222548</p></br>

### <p align="center">FRAMEWORK WEB BASED</p>

### <p align="center">2025</p>

---

## 🧑‍🤝‍🧑 Role dan Hak Akses

| Role            | Fitur-Fitur                                                                 |
|------------------|------------------------------------------------------------------------------|
| Admin           | Kelola jadwal kolam, data booking, data pengguna, data kolam, laporan       |
| Pengguna        | Lihat kolam & slot, booking kolam, upload bukti, riwayat, edit/batal booking |
| Customer Service| Lihat booking, jawab pertanyaan, bantu masalah reservasi                    |


---

## 🗃️ Struktur Database

### 1. Tabel `users`

| Field       | Tipe Data      | Keterangan                                  |
|-------------|----------------|---------------------------------------------|
| id          | bigint (PK)    | ID pengguna                                 |
| name        | varchar(100)   | Nama pengguna                               |
| email       | varchar(100)   | Harus unik                                  |
| password    | varchar(255)   | Password terenkripsi                        |
| role        | enum           | Peran: 'admin', 'pengguna', 'cs'            |
| created_at  | timestamp      | Tanggal dibuat                              |
| updated_at  | timestamp      | Terakhir diperbarui                         |


### 2. Tabel `pool (data kolam renang)`

| Field           | Tipe Data       | Keterangan                             |
|------------------|------------------|------------------------------------------|
| id              | bigint (PK)      | ID kolam                                 |
| name            | varchar(100)     | Nama kolam (misalnya: Kolam Anak)        |
| description     | text             | Deskripsi kolam                          |
| price_per_hour  | decimal(10,2)    | Harga sewa per jam                       |
| status          | enum             | Status kolam: 'tersedia', 'perbaikan'    |
| created_at      | timestamp        | Tanggal dibuat                           |
| updated_at      | timestamp        | Terakhir diperbarui                      |


### 3. Tabel `bookings (data pemesanan)`

| Field        | Tipe Data         | Keterangan                                 |
|--------------|-------------------|--------------------------------------------|
| id           | bigint (PK)       | ID pemesanan                                |
| user_id      | bigint (FK)       | Relasi ke `users`                           |
| pool_id      | bigint (FK)       | Relasi ke `pools`                           |
| booking_date | date              | Tanggal pemesanan                           |
| start_time   | time              | Jam mulai renang                            |
| end_time     | time              | Jam selesai renang                          |
| status       | enum              | 'pending', 'confirmed', 'cancelled'         |
| created_at   | timestamp         | Tanggal dibuat                              |
| updated_at   | timestamp         | Terakhir diperbarui                         |


### 4. Tabel `payments (data pembayaran)`

| Field           | Tipe Data     | Keterangan                             |
|-----------------|---------------|----------------------------------------|
| id              | bigint (auto) | Primary key                            |
| booking_id      | bigint        | Relasi ke tabel bookings               |
| payment_proof   | VARCHAR(255)  | Upload bukti transfer                  |
| amount          | DECIMAL(10,2) | Jumlah pembayaran                      |
| status          | ENUM          | 'belum diverivikasi','valid','invalid' |
| created_at      | TIMESTAMP     | Tanggal upload bukti                   |

## 🔗 Relasi Antar Tabel

| Tabel Asal  | Tabel Tujuan | Relasi      | keterangan                                   |
|-------------|--------------|-------------|----------------------------------------------|
| users       | bookings     | one-to-many | Satu pengguna dapat melakukan banyak booking |
| pools       | bookings     | one-to-many | Satu kolam dapat dibooking berkali-kali      |
| bookings    | payments     | one-to-one  | Satu pemesanan memiliki satu data pembayaran |
