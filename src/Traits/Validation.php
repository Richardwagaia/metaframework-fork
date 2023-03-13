<?php

namespace MetaFramework\Traits;

use Illuminate\Foundation\Http\FormRequest;

trait Validation
{
    use Responses;

    protected array $validation_rules = [];
    protected array $validation_messages = [];
    /**
     * @var array<string, mixed>
     */
    protected array $validated_data = [];

    protected function validation(): void
    {
        if ($this->validation_rules) {
            $this->validated_data = request()->validate(
                $this->validation_rules,
                $this->validation_messages
            );
        }
    }

    private function ensureDataIsValid(FormRequest $request, string $key): bool
    {

        $this->validated_data = is_array($request->validated()) && array_key_exists($key, $request->validated())
            ? (array)$request->validated($key)
            : [];

        if (!$this->validated_data) {
            $this->responseWarning("Les données n'ont pas pu être composées correctement.");
        }
        return (bool)$this->validated_data;

    }
}
