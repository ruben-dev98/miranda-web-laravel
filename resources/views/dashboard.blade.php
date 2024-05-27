<x-app-layout>
    @section('title', 'Dashboard')
    @section('content')
        <header class="banner">
            <div class="banner__inner banner__inner--about --max-width">
                <p class="font__title font__title--dark upper__case">The Ultimate Luxury </p>
                <h2 class="font__subtitle font__subtitle--banner font__subtitle--dark">Dashboard</h2>
            </div>
            <div class="banner__pagination">
                <span>Home</span><span>|</span><span>Dashboard</span>
            </div>
        </header>
        @include('layouts.navigation')
        <div class="py-12">
            <table class="table --max-width">
                <thead>
                    <tr>
                        @foreach (['ID', 'Guest Name', 'Room', 'Actions'] as $prop)
                            <th>{{ $prop }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ([['ID' => 1, 'Guest' => 'Jacinto', 'Room' => 'Double Suite 20'], ['ID' => 1, 'Guest' => 'Jacinto', 'Room' => 'Double Suite 20'], ['ID' => 1, 'Guest' => 'Jacinto', 'Room' => 'Double Suite 20']] as $info)
                        <tr>
                            <td>{{$info['ID']}}</td>
                            <td>{{$info['Guest']}}</td>
                            <td>{{$info['Room']}}</td>
                            <td class="actions">
                                <button>
                                    <img src="{{ asset('assets/icon/edit-order.svg') }}">
                                </button>
                                <button>
                                    <img src="{{ asset('assets/icon/delete-order.svg') }}">
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
</x-app-layout>
