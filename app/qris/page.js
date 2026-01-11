export default function QRIS() {
  return (
    <main className="max-w-md mx-auto p-4">
      <h1 className="text-xl font-bold mb-3">Pembayaran QRIS</h1>
      <img src="/qris.png" alt="QRIS" className="w-full mb-3" />
      <ol className="list-decimal list-inside text-sm text-gray-700">
        <li>Scan QR menggunakan aplikasi e-wallet</li>
        <li>Lakukan pembayaran sesuai nominal</li>
        <li>Kirim bukti ke WhatsApp admin</li>
      </ol>
    </main>
  )
}
