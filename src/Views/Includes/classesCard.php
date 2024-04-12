<div class="container-md bg-secondary-subtle mt-5 mb-5 rounded d-flex justify-content-around">
        <div class="d-flex flex-column mt-2 justify-content-center">
            <h3><?= $class->getName() . '-' . $class->getStartTime()->format('d/m/Y');?></h3>
            <p>15 participants.es</p>
        </div>
        <button type="button" class="btn btn-primary mt-auto mb-auto" id="presenceValidation<?=$class->getName().$roleForId?>">Valider présence</button>
</div>