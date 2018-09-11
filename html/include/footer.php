<?php
if (!defined('IN_CB')) { die('NO tienes permitido acceder a esta página.'); }
?>

			<div><span><img src="../imagenes/quiero_pagar/logo_pago_facil.png" width="100" /></span>
            	<p style="font-size:16px; text-align:center;">Cupón para realizar el pago de la deuda de EPB&A</p>
            </div>
            <div class="output">
                <section class="output" style="text-align:center">
                    
                    <?php
                        $finalRequest = '';
                        foreach (getImageKeys() as $key => $value) {
                            $finalRequest .= '&' . $key . '=' . urlencode($value);
                        }
                        if (strlen($finalRequest) > 0) {
                            $finalRequest[0] = '?';
                        }
                    ?>
                    <div id="imageOutput">
                        <?php if ($imageKeys['text'] !== '') { ?><img src="image.php<?php echo $finalRequest; ?>" alt="Barcode Image" /><?php }
                        else { ?>Completa el formulario para obtener el código.<?php } ?>
                    </div>
                </section>
            </div>
        </form>

        <div class="footer">
            <footer>
          
            </footer>
        </div>
        <script>window.print();</script>
    </body>
</html>