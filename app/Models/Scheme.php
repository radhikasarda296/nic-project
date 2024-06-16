<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      schema="Scheme",
 *      title="Scheme",
 *      description="Scheme model",
 *      @OA\Property(
 *          property="id",
 *          type="string",
 *          description="Unique identifier for the scheme",
 *          example=1
 *      ),
 *      @OA\Property(
 *          property="scheme_code",
 *          type="string",
 *          description="Code of the scheme",
 *          example="SCHEME001"
 *      ),
 *      @OA\Property(
 *          property="scheme_name",
 *          type="string",
 *          description="Name of the scheme",
 *          example="Scheme A"
 *      ),
 *      @OA\Property(
 *          property="central_state_scheme",
 *          type="string",
 *          description="Type of scheme (Central or State)",
 *          example="Central"
 *      ),
 *      @OA\Property(
 *          property="fin_year",
 *          type="string",
 *          description="Financial year",
 *          example="2023-2024"
 *      ),
 *      @OA\Property(
 *          property="state_disbursement",
 *          type="string",
 *          description="State disbursement amount",
 *          example="1000000.50"
 *      ),
 *      @OA\Property(
 *          property="central_disbursement",
 *          type="string",
 *          description="Central disbursement amount",
 *          example="500000.75"
 *      ),
 *      @OA\Property(
 *          property="total_disbursement",
 *          type="string",
 *          description="Total disbursement amount",
 *          example="1500001.25"
 *      ),
 * )
 */
class Scheme extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'scheme';
    protected $fillable = [
        'id',
        'scheme_code',
        'scheme_name',
        'central_state_scheme',
        'fin_year',
        'state_disbursement',
        'central_disbursement',
        'total_disbursement',
    ];
}
