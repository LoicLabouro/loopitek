<div class="colorfont">
    <div class="container" style="padding: 10px;">
        <h1 class="font1">Ajouter une musique</h1>
        <div style="padding: 10px;">
            </div>
            <div class="d-flex flex-row justify-content-center">
                <form enctype="multipart/form-data" method="POST" action="index.php?page=Controler&param=AjoutMusique">
                    <div class="form-group">
                        <label class="font3">Musique</label>
                        <input type="hidden" class="form-control" name="MAX_FILE_SIZE"  value="10000000"  />
                        <label class="btn btn-secondary">
                            Choisir une musique&hellip; <input name="Video" type="file" style="display: none;">
                        </label>

                    </div>
                    <button type="submit" class="btn btn-outline-secondary marginAuto w-100">Ajouter</button>
                </form>
            </div>
    </div>
</div>