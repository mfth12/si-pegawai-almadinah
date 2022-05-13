<?php

namespace App\Policies;

use App\Models\Pengguna;
use App\Models\Santri;
use Illuminate\Auth\Access\HandlesAuthorization;

class SantriPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Pengguna $pengguna)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Pengguna $pengguna, Santri $santri)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Pengguna $pengguna)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Pengguna $pengguna, Santri $santri)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Pengguna $pengguna, Santri $santri)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Pengguna $pengguna, Santri $santri)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Pengguna  $pengguna
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Pengguna $pengguna, Santri $santri)
    {
        //
    }
}
