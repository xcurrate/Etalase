import products from './data/products.json'

export default function Home() {
  return (
    <main className="max-w-md mx-auto p-4">
      <h1 className="text-2xl font-bold mb-4">Aplikasi Premium</h1>
      <div className="space-y-4">
        {products.filter(p => p.active).map(p => (
          <div key={p.id} className="bg-white p-4 rounded shadow">
            <h2 className="font-semibold">{p.name}</h2>
            <p className="text-sm text-gray-600">{p.description}</p>
            <p className="mt-2 font-bold">Rp {p.price} / {p.duration}</p>
            <a
              href={`https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20order%20${encodeURIComponent(p.name)}`}
              className="inline-block mt-3 bg-green-600 text-white px-4 py-2 rounded"
            >
              Beli / Order
            </a>
          </div>
        ))}
      </div>
    </main>
  )
}
