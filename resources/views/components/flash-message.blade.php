@if(session('success'))
<div x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 2500)"
    class="z-40 fixed top-10 left-1/2 transform -translate-x-1/2 bg-white shadow-md shadow-blue-700 rounded-2xl text-emerald-400 text-md px-20 py-3">
        <p>{{session('success')}}</p>
    </div>
@endif

@if(session('error'))
    <div x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 2500)"
         class="z-40 fixed top-10 left-1/2 transform -translate-x-1/2 bg-white shadow-md shadow-blue-700 rounded-2xl text-emerald-400 text-md px-20 py-3">
        <p>{{session('error')}}</p>
    </div>
@endif
