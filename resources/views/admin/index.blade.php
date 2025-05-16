<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">


      <a class="mb-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-350" href="{{ route('dashboard') }}">
        {{ __('Вернуться к моим заявкам') }}
      </a>
      <div class='cards flex flex-wrap gap-4'>
        @foreach($reports as $report)
        <div class='div-col border border-gray-500  rounded-lg p-6 mt-4 w-80'>
          <p class="text-sm text-gray-500">Время подачи заявки: {{\Carbon\Carbon::parse($report->created_at)->translatedFormat('j F Y')}}</p>
          <span class='text-xl font-semibold	'>Адрес: {{$report->adress}}</span>
          <p class='text-l font-semibold	'>Вид ремонта: {{$report->type}}</p>
          <p class='text-l font-semibold	'>Дата: {{$report->date}}, Время: {{$report->time}}</p>
          <p class='text-l font-semibold	'>Способ оплаты: {{$report->payment}}</p>
         

          @if($report->status->title=="Новая")
          <form id="form-update-{{$report->id}}" action="{{route('reports.update')}}" method="POST">
            <div>
              @csrf
              @method('PUT')
              <input type="hidden" name="id" value="{{$report->id}}">
              <select name="status_id" onchange="document.getElementById('form-update-{{$report->status_id}}').submit()" class="border-none rounded-xl bg-green-300 mt-3 font-medium">
                <option value='1'>Новая</option>
                <option value='2'>В процессе</option>
                <option value='3'>Завершена</option>
                <option value='4'>Отменена</option>
              </select>
            </div>
          </form>
          @else
          <p id="statusColor" class='statusColor font-medium text-s bg-gray-300 pt-2 pb-2 pl-5 pr-5 rounded-xl	mt-3 w-min border-none'>{{$report->status->title}}</p>
          @endif
        </div>
        @endforeach
      </div>
    </div>
</x-app-layout>