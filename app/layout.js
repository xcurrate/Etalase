import './globals.css'

export const metadata = {
  title: 'Toko Aplikasi Premium',
  description: 'Beli akses aplikasi premium cepat dan aman'
}

export default function RootLayout({ children }) {
  return (
    <html lang="id">
      <body className="bg-gray-50 text-gray-900">{children}</body>
    </html>
  )
}
