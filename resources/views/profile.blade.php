@extends('components.layout')

@section('content')
    <main class="px-5 py-10 no-scrollbar" x-data="{ editModal: false, selectedPicture: '{{ Auth::user()->picture }}' }">
        <div
            class="flex relative items-center shadow-2xl text-center mx-auto flex-col bg-gradient-to-r from-[#00A1E9] to-[#6367B0] w-full font-mulish text-white rounded-[5px] py-4">
            <span class="text-base">Profile</span>
            <div>
                <img class="w-32 h-32 rounded-full mt-4 mx-auto" :src="selectedPicture" src="{{ Auth::user()->picture }}"
                    id="profilePicture" alt="">
                <h1 class="text-xl font-bold mt-6">{{ Auth::user()->name }}</h1>
            </div>
            <div class="absolute top-4 right-4" id="changeProfile">
                <a href="#" @click.prevent="editModal = true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        viewBox="0 0 512 512">
                        <path
                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1 0 32c0 8.8 7.2 16 16 16l32 0zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="mt-6 px-6">
            <div class="flex mt-8">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M337.8 5.4C327-1.8 313-1.8 302.2 5.4L166.3 96 48 96C21.5 96 0 117.5 0 144L0 464c0 26.5 21.5 48 48 48l208 0 0-96c0-35.3 28.7-64 64-64s64 28.7 64 64l0 96 208 0c26.5 0 48-21.5 48-48l0-320c0-26.5-21.5-48-48-48L473.7 96 337.8 5.4zM96 192l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM96 320l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64c0-8.8 7.2-16 16-16zm400 16c0-8.8 7.2-16 16-16l32 0c8.8 0 16 7.2 16 16l0 64c0 8.8-7.2 16-16 16l-32 0c-8.8 0-16-7.2-16-16l0-64zM232 176a88 88 0 1 1 176 0 88 88 0 1 1 -176 0zm88-48c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16s-7.2-16-16-16l-16 0 0-16c0-8.8-7.2-16-16-16z" />
                    </svg>
                </div>
                <div class="ml-6 font-mulish">
                    <h1 class=" text-base font-bold">Kelas</h1>
                    @if (Auth::user()->class == null)
                        <h2 class="text-base font-normal">Belum diatur</h2>
                    @endif
                    <h2 class="text-base font-normal">{{ Auth::user()->class }}</h2>
                </div>
            </div>
            <div class="flex mt-10">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        viewBox="0 0 384 512">
                        <path
                            d="M16 64C16 28.7 44.7 0 80 0L304 0c35.3 0 64 28.7 64 64l0 384c0 35.3-28.7 64-64 64L80 512c-35.3 0-64-28.7-64-64L16 64zM224 448a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM304 64L80 64l0 320 224 0 0-320z" />
                    </svg>
                </div>
                <div class="ml-6 font-mulish">
                    <h1 class=" text-base font-bold">Nomor Handphone</h1>
                    @if (Auth::user()->phone == null)
                        <h2 class="text-base font-normal">Belum diatur</h2>
                    @endif
                    <h2 class="text-base font-normal">{{ Auth::user()->phone }}</h2>
                </div>
            </div>
            <div class="flex mt-10">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        viewBox="0 0 448 512">
                        <path
                            d="M152 24c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L64 64C28.7 64 0 92.7 0 128l0 16 0 48L0 448c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-256 0-48 0-16c0-35.3-28.7-64-64-64l-40 0 0-40c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 40L152 64l0-40zM48 192l80 0 0 56-80 0 0-56zm0 104l80 0 0 64-80 0 0-64zm128 0l96 0 0 64-96 0 0-64zm144 0l80 0 0 64-80 0 0-64zm80-48l-80 0 0-56 80 0 0 56zm0 160l0 40c0 8.8-7.2 16-16 16l-64 0 0-56 80 0zm-128 0l0 56-96 0 0-56 96 0zm-144 0l0 56-64 0c-8.8 0-16-7.2-16-16l0-40 80 0zM272 248l-96 0 0-56 96 0 0 56z" />
                    </svg>
                </div>
                <div class="ml-6 font-mulish">
                    <h1 class=" text-base font-bold">Tanggal Lahir</h1>
                    @if (Auth::user()->date_of_birth == null)
                        <h2 class="text-base font-normal">Belum diatur</h2>
                    @endif
                    <h2 class="text-base font-normal">{{ Auth::user()->date_of_birth }}</h2>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div x-show="editModal" x-transition
            class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-[80%]" x-data="editProfileForm('{{ Auth::user()->picture ?? '' }}', '{{ Auth::user()->phone ?? '' }}', '{{ Auth::user()->date_of_birth ?? '' }}')">
                <h2 class="text-2xl font-bold mb-4 text-center">Lengkapi Data Diri</h2>
                <form method="POST" action="/profile/update">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="picture">Foto Profil</label>
                        <div class="flex space-x-4">
                            <img src="{{ asset('assets/icons/man-profile.webp') }}"
                                class="w-20 h-20 rounded-full cursor-pointer"
                                @click="selectedPicture = '/assets/icons/man-profile.webp'"
                                :class="selectedPicture === '/assets/icons/man-profile.webp' ?
                                    'border-4 border-blue-500' : ''">
                            <img src="{{ asset('assets/icons/woman-profile.webp') }}"
                                class="w-20 h-20 rounded-full cursor-pointer"
                                @click="selectedPicture = '/assets/icons/woman-profile.webp'"
                                :class="selectedPicture === '/assets/icons/woman-profile.webp' ?
                                    'border-4 border-blue-500' : ''">
                        </div>
                        <input type="hidden" name="picture" :value="selectedPicture">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">Nomor Handphone</label>
                        <input pattern="\(?[0-9]{3}\)?[- .]?[0-9]{3}[- .]?[0-9]{4}" placeholder="cth: 0812..."
                            minlength="11" min="200" pattern="^\d{10}$" required inputmode="numeric" type="tel"
                            id="phone" name="phone" x-model="phone"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    {{-- @dd(Auth::user()) --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="kelas">Kelas</label>
                        <div class="text-white ">
                            <select id="class" name="class"
                                class="bg-transparentshadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="{{ Auth::user()->class }}" hidden selected>
                                    {{ Auth::user()->class ? Auth::user()->class : 'Kelas Kamu' }}</option>
                                <option class="text-black">XII PPLG 1</option>
                                <option class="text-black">XII PPLG 2</option>
                                <option class="text-black">XII DKV 1</option>
                                <option class="text-black">XII DKV 2</option>
                                <option class="text-black">XII BCF 1</option>
                                <option class="text-black">XII BCF 2</option>
                                <option class="text-black">XI PPLG 1</option>
                                <option class="text-black">XI PPLG 2</option>
                                <option class="text-black">XI DKV 1</option>
                                <option class="text-black">XI DKV 2</option>
                                <option class="text-black">XI BCF 1</option>
                                <option class="text-black">XI BCF 2</option>
                                <option class="text-black">X PPLG 1</option>
                                <option class="text-black">X PPLG 2</option>
                                <option class="text-black">X DKV 1</option>
                                <option class="text-black">X DKV 2</option>
                                <option class="text-black">X BCF 1</option>
                                <option class="text-black">X BCF 2</option>

                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="date_of_birth">Tanggal
                            Lahir</label>
                        <input type="date" id="date_of_birth" name="date_of_birth" x-model="dateOfBirth"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" :disabled="!isFormValid"
                            :class="isFormValid ? 'bg-blue-500 hover:bg-blue-700' : 'bg-gray-300 cursor-not-allowed'"
                            class="text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
                        <button type="button" @click="editModal = false"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    @include('components.partials.navbar')
@endsection
