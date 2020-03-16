<?php

namespace App\Console\Commands;

use App\Events\NotificarMaxpoint;
use Illuminate\Console\Command;

class NotificarMaxpointCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maxpoint:notificacion';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enviar notificacion a los clientes del websocket de maxpoint';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $datos = [
            "mensaje" => "Notificacion",
            "imagen" => asset("img/manos.jfif")
        ];
        broadcast(new NotificarMaxpoint($datos));
    }
}
