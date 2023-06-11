# AmendUsage200ApplicationJSON

OK


## Fields

| Field                                                                                                            | Type                                                                                                             | Required                                                                                                         | Description                                                                                                      |
| ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- |
| `duplicate`                                                                                                      | array<[AmendUsage200ApplicationJSONDuplicate](../../models/operations/AmendUsage200ApplicationJSONDuplicate.md)> | :heavy_minus_sign:                                                                                               | An array of strings, corresponding to idempotency_key's marked as duplicates (previously ingested)               |
| `ingested`                                                                                                       | array<*string*>                                                                                                  | :heavy_minus_sign:                                                                                               | An array of strings, corresponding to idempotency_key's which were successfully ingested.                        |