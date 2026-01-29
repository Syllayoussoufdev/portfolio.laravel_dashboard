@extends('layouts.portfolio_master');
@section('title', 'Messages reçus')
    @section('content')
      <main class="flex-shrink-0">
            <!-- Contact Section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Messages reçus</span></h1>
                    </div>
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-11 col-xl-9 col-xxl-8">
                            <!-- Messages Table -->
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Objet</th>
                                        <th>Message</th>
                                        <th>Date de réception</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($messages as $message)
                                    <tr>
                                        <td>{{ $message->nom }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->sujet }}</td>
                                        <td>{{ $message->message }}</td>
                                        <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    @endsection