<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------
    public $login = [
        'username' => 'required',
        'password' => 'required'
    ];

    public $barang = [
        'nama_barang' => 'required|is_unique[barangs.nama_barang]',
        'kategori' => 'required',
        'merk' => 'required',
        'stok' => 'required|numeric',
        'harga_beli' => 'required|numeric',
        'harga_jual' => 'required|numeric',
        'satuan' => 'required'
    ];

        
    public $rekening = [
        'nama_bank' => 'required',
        'users_id' => 'required',
        'nomer_rekening' => 'required|numeric',
        'saldo' => 'required|numeric'
    ];

    public $karyawan = [
        'username' => 'required|is_unique[users.username]',
        'level' => 'required',
        'noHp' => 'required|numeric',
        'password' => 'required'
    ];
    public $pengguna = [
        'nama' => 'required',
        'username' => 'required|is_unique[users.username]',
        'level' => 'required',
        
    ];
}
