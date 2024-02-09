<?php


class NotaServicio
{

    private INotaRepository $repository;

    public function __construct()
    {
        $this->repository = new NotaRepository();
    }




    /* Get all notes */

    public function getNotas(): array
    {

        return $this->repository->getNotas();
    }

    /* Get note by id */

    public function getNoteById($id)
    {
        return $this->repository->getNotaById($id);
    }

    /* Save note */

    //Se usa para crear una nueva nota y para editar una ya existente
    public function save(Nota $nota)
    {

        $notaToVista = null;
        /* Check if exists */
        if ($nota->getId() !== null) {
            if ($this->repository->updateNota($nota)) {
                $notaToVista = $nota;
            }
        } else {
            $notaToVista = $this->repository->create($nota);
        }

       
        return $notaToVista;
    }

    /* Delete note by id */

    public function deleteNoteById($id): bool
    {
        return $this->repository->deleteNota($id);
    }

}

?>