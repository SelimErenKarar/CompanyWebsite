<?php

$alert = $this->session->userdata("alert");

if($alert)
{
    if ($alert["type"]=== "warning"){?>

        <script>
            $("#open-alert").iziModal({
                title: '<?php echo $alert["title"];?>',
                subtitle: '<?php echo $alert["subtitle"];?>',
                headerColor: 'darkred',
                icon: 'fas fa-times-circle',
                iconText: null,
                iconColor: '',
                rtl: false,
                width: 450,
                top: null,
                bottom: null,
                borderBottom: true,
                padding: 0,
                radius: 3,
                zindex: 999,
                openFullscreen: false,
                closeOnEscape: true,
                closeButton: true,
                timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
                transitionIn: 'comingIn',
                transitionOut: 'comingOut',
                transitionInOverlay: 'fadeIn',
                transitionOutOverlay: 'fadeOut',

            });
            $("#open-alert").iziModal("open");
        </script>


    <?php }elseif ($alert["type"]=== "success"){?>

        <script>
            $("#open-alert").iziModal({
                title: '<?php echo $alert["title"];?>',
                subtitle: '<?php echo $alert["subtitle"];?>',
                headerColor: 'green',
                icon: 'far fa-check-circle',
                iconText: null,
                iconColor: '',
                rtl: false,
                width: 450,
                top: null,
                bottom: null,
                borderBottom: true,
                padding: 0,
                radius: 3,
                zindex: 999,
                openFullscreen: false,
                closeOnEscape: true,
                closeButton: true,
                timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
                transitionIn: 'comingIn',
                transitionOut: 'comingOut',
                transitionInOverlay: 'fadeIn',
                transitionOutOverlay: 'fadeOut',

            });
            $("#open-alert").iziModal("open");
        </script>

    <?php }elseif ($alert["type"]=== "error"){?>

        <script>
            $("#open-alert").iziModal({
                title: '<?php echo $alert["title"];?>',
                subtitle: '<?php echo $alert["subtitle"];?>',
                headerColor: 'darkred',
                icon: 'far fa-times-circle',
                iconText: null,
                iconColor: '',
                rtl: false,
                width: 450,
                top: null,
                bottom: null,
                borderBottom: true,
                padding: 0,
                radius: 3,
                zindex: 999,
                openFullscreen: false,
                closeOnEscape: true,
                closeButton: true,
                timeoutProgressbarColor: 'rgba(255,255,255,0.5)',
                transitionIn: 'comingIn',
                transitionOut: 'comingOut',
                transitionInOverlay: 'fadeIn',
                transitionOutOverlay: 'fadeOut',

            });
            $("#open-alert").iziModal("open");
        </script>

    <?php }
}
