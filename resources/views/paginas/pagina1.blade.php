@extends('layouts.notificaciones')

@section('content')
    <div>Este es el contenido de la pagina</div>
@endsection
@section('js-body-bottom')
    <script>
        $(document).ready(function () {
            window.Echo = new Echo({
                broadcaster: 'pusher',
                key: 'websocketkey',
                wsHost: window.location.hostname,
                wsPort: 6001,
                disableStats: true,
            });

            Echo.channel('alertas-mp')
                .listen('NotificarMaxpoint', (event) => {
                    var datos = event.datos;
                    crearModal(datos)
                });
        });

        function crearModal(datos) {
            var contenidoDiv = crearHtmlModalAlertaMaxpoint(datos);
            var $modalNotificacionMaxpoint = $(contenidoDiv);
            $("body").append($modalNotificacionMaxpoint);
            $modalNotificacionMaxpoint.on("hidden.bs.modal", function () {
                $(this).remove();
            });
            $modalNotificacionMaxpoint.modal("show");
        }

        function crearHtmlModalAlertaMaxpoint(datos) {
            var bodyNotificacion = crearBodyModaleAlertaMaxpoint(datos);
            return "<div class=\"modal fade\" id=\"exampleModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\">\n" +
                "  <div class=\"modal-dialog modal-lg\" role=\"document\">\n" +
                "    <div class=\"modal-content\">\n" +
                "      <div class=\"modal-header\">\n" +
                "        <h4 class=\"modal-title\" id=\"exampleModalLabel\">Notificación MaxPoint</h4>" +
                "        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>\n" +
                "      </div>\n" +
                "      <div class=\"modal-body\">" +bodyNotificacion+
                "      </div>\n" +
                "      <div class=\"modal-footer\">\n" +
                "        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cerrar</button>\n" +
                "      </div>\n" +
                "    </div>\n" +
                "  </div>\n" +
                "</div>";
        }

        function crearBodyModaleAlertaMaxpoint(datos) {
            return  "<div class='row'>" +
                "   <div class='col col-xs-12'>" +
                "       <img src='" + datos.imagen + "' />" +
                "   </div>" +
                "</div>";
        }
    </script>
@endsection
