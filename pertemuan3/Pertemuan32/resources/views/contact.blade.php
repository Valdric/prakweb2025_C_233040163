<x-layout>
<x-slot:title>Contact Us</x-slot:title>
<x-slot:header>
<h2 class="text-xl font-semibold text-white">Hubungi Kami</h2>
</x-slot:header>


<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
<div class="card-elite p-6 rounded-lg">
<h3 class="text-lg font-medium text-white">Informasi Kontak</h3>
<p class="text-gray-400">Punya pertanyaan atau ingin berkolaborasi? Hubungi kami.</p>


<div class="mt-6 space-y-4 text-gray-300">
<div>
<h4 class="font-semibold">Alamat</h4>
<p class="text-sm">Jl. sitimurgi</p>
</div>
<div>
<h4 class="font-semibold">Email</h4>
<p class="text-sm">valdric@gmail.com</p>
</div>
</div>
</div>


<div class="card-elite p-6 rounded-lg">
<form action="#" method="POST" class="space-y-4">
<div>
<label class="block text-sm text-gray-300">Nama</label>
<input type="text" name="name" class="mt-1 w-full rounded-md p-2 bg-black/40 text-white border border-gray-700" placeholder="Nama Anda">
</div>
<div>
<label class="block text-sm text-gray-300">Email</label>
<input type="email" name="email" class="mt-1 w-full rounded-md p-2 bg-black/40 text-white border border-gray-700" placeholder="anda@example.com">
</div>
<div>
<label class="block text-sm text-gray-300">Pesan</label>
<textarea name="message" rows="4" class="mt-1 w-full rounded-md p-2 bg-black/40 text-white border border-gray-700" placeholder="Tulis pesan Anda..."></textarea>
</div>
<div>
<button type="submit" class="w-full py-2 rounded-md btn-premium text-white">Kirim Pesan</button>
</div>
</form>
</div>
</div>
</x-layout>